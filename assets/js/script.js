const app = {
    data() {
        return {
            messages: [],
        }
    },

    methods: {
        sendMessage(val) {
            $.get('sendMessage.php?message=' + document.querySelector('#message_content').value).done((data) => {
                console.log(data);
                this.messages.push(data);
            })
        },
    },

    created() {
        $.get('getMessage.php').done((data) => {
            this.messages = data;
        });
    },

    mounted: function () {
        this.timer = setInterval(() => {
            $.get('getMessage.php').done((data) => {
                this.messages = data;
            });
        }, 1000)
    },

}

Vue.createApp(app).mount('#app');

Array.prototype.sum = function () {
    return this.reduce((prev, cur) => prev + cur, 0);
}