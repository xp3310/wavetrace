var bnb = bnb || {};
bnb.vue = (function(){
    var _data = {},
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

            _vm = new Vue({
                el: _id,
                data: _data,
                methods: _method
            });
        }

    }
})();
