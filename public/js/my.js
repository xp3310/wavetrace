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
