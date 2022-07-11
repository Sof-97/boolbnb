<template>
    <div>
        <form action=""></form>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "MessageComp",
    form: new Form({
        email_sender: "",
        text: "",
        id_apartment: "",
    }),
    methods: {
        submit() {
            let data = new FormData();
            data.append("email_sender", this.form.email_sender);
            data.append("text", this.form.text);
            data.append("id_apartment", this.form.id_apartment);
            axios.post("/Api/messages", data).then((res) => {
                console.log(res);
                this.form.reset();
            });
        },
    },
};
</script>
