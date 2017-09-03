var form = form || {};
form = (function(){

    var _vueMethod = {},
        _vueData = {},
        _id='#form',
        _fm

    var _updateUrl,
        _formName,
        _fieldData;


    return {

        run: function() {
            _fm = new Vue({
                el: _id,
                data: _vueData,
                methods: _vueMethod
            });
        },

        init: function(fieldData, formName, updateUrl) {
            _fieldData = fieldData;
            _formName = formName;
            _updateUrl = updateUrl;

            _vueData = {
                form: _fieldData,
                loading: false,
                error: {},
            }

            $.each(_vueData.form, function(i, v){
                _vueData.error[i] = '';
            });

            _vueMethod = {
                onMyFormSubmit() {
                    var that = this;
                    that.loading = true;
                    that.$http.post(_updateUrl, that.form, {'headers': {'X-CSRF-TOKEN': Laravel.csrfToken}} ).then( function(obj) {
                        that.clearError();
                        that.loading = false;

                        if (obj.body.status == false) {
                            $.each(obj.body.extInfo.error, function(k, v) {
                                that.error[k] = v;
                            })
                        }

                        if (obj.body.status == true) {
                            that.$message({message: "{{ trans('common.saveSuccess') }}",
                                           type: 'success'});

                            if ( obj.body.redirect != undefined ) window.location.href = obj.body.redirect;
                        }
                    }, function(e){

                    });
                },

                onMyFormCancel() {
                    window.history.back();
                    // window.location.reload();
                },


                onAddTextPairInfo(textPairName) {
                    this.form[textPairName].push( {'label': '', 'value': ''} )
                },

                onRemoveInfo(textPairName, key) {
                    this.form[textPairName].splice(key, 1);
                },
                clearError() {
                    var that = this;
                    $.each(that.error, function(k, v) {
                        that.error[k] = '';
                    })
                }

            }

        }
    }
})();