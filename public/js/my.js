var bnb = bnb || {};
bnb.vue = (function(){
    var _data = {menuIndex: sessionStorage.getItem('menuIndex') || '2-1'},
        _method = {},
        _id='#app',
        _vm;

    return {
        setData: function(data) {
            $.extend(_data, data);
        },

        setMethod: function(method) {
            $.extend(_method, method);
        },

        run: function() {

            this.setMethod({
            	setSession : function(name, data) {
                	sessionStorage.setItem(name, data);
                },

                getSession : function(name) {
                	return sessionStorage.getItem(name);
                }
            });

            _vm = new Vue({
                el: _id,
                data: _data,
                methods: _method
            });
        }
    }
})();


bnb.form = (function(){
    var _updateUrl,
        _formName,
        _fieldData,
        _vueMethod = {},
        _vueData = {}

    return {
        init: function(fieldData, formName, updateUrl) {
            _fieldData = fieldData;
            _formName = formName;
            _updateUrl = updateUrl;

            _vueData = {
                form: _fieldData,
                loading: false,
                error: {}
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
                        if (obj.body.status == 'false') {
                            $.each(obj.body.extInfo.error, function(k, v) {
                                that.error[k] = v;
                            })
                        }

                        if (obj.body.status == 'true') {
                            that.$message({message: "{{ trans('common.saveSuccess') }}",
                                           type: 'success'});
                        }
                    }, function(e){

                    });
                },

                onMyFormCancel() {
                    window.location.reload();
                },


                onAddTextPairInfo(textPairName) {
                    this.form[textPairName].push( {'label': '', 'value': ''} )
                },

                clearError() {
                    var that = this;
                    $.each(that.error, function(k, v) {
                        that.error[k] = '';
                    })
                }

            }
        },

        getVueData: function() {
            return _vueData;
        },

        getVueMethod: function() {
            return _vueMethod;
        },

        run: function() {
            bnb.vue.setData(_vueData);
            bnb.vue.setMethod(_vueMethod);
        }

    }
})();
