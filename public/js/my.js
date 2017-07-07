var bnb = bnb || {};

bnb.say = function(){

    return {
        hello: function() {
            alert('hello');
        }
    }
}();

bnb.session = function(){

    return {

        set: function(name, data) {
            console.log(name, data);
            sessionStorage.setItem(name, data);
        },

        get: function(name) {
            return sessionStorage.getItem(name);
        }
    }

}();

bnb.vue = function(){
    var _data = {},
        _method = {},
        _id='',
        _vm;

    return {

        setData: function(data) {
            $.extend(_data, data);
        },

        setMethod: function(method) {
            $.extend(_method, method);
        },

        run: function(id) {

            _id = id;

            _vm = new Vue({
                el: _id,
                data: _data,
                methods: _method
            });
        }
    }
}();

console.log(bnb.say);