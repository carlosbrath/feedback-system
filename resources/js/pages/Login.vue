<template>
    <div class="mx-auto w-4/12 mt-10 bg-blue-200 p-4 rounded-lg">
        <!-- component -->
        <div class="row">
            <div class="bg-white shadow-lg rounded-l px-8 pt-6 pb-8 mb-2 offset-md-4 col-6 flex flex-col">
                <h1 class="text-center"> Login </h1>
                <ul class="list-disc text-red-400" v-for="(value, index) in errors" :key="index"
                    v-if="typeof errors === 'object'">
                    <li>{{ value[0] }}</li>
                </ul>
                <p class="list-disc text-red-400" v-if="typeof errors === 'string'">{{ errors }}</p>
                <form method="post" @submit.prevent="handleLogin">
                    <div class="form-group">
                        <label class="" for="username">
                            Email Address
                        </label>
                        <input class="form-control" id="username" type="text" v-model="form.email" required />
                    </div>
                    <div class="form-group">
                        <label class="" for="password">
                            Password
                        </label>
                        <input class="form-control" id="password" type="password" v-model="form.password" required />
                        <!-- <p class="text-red text-xs italic">Please choose a password.</p> -->
                    </div>
                    <div class="form-group text-center mt-2">
                        <button class="btn btn-primary m-2" type="submit">
                            Sign In
                        </button>
                        <router-link class="btn btn-secondary m-2" to="register">
                            Sign Up
                        </router-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref } from 'vue';
import axios from 'axios';
import { useRouter } from "vue-router";
export default {
    setup() {
        const errors = ref()
        const router = useRouter();
        const form = reactive({
            email: '',
            password: '',
        })
        const handleLogin = async () => {
            try {
                const result = await axios.post('/api/auth/login', form)
                if (result.status === 200 && result.data && result.data.token) {
                    localStorage.setItem('APP_DEMO_USER_TOKEN', result.data.token)
                    await router.push('/home')
                }
            } catch (e) {
                if (e && e.response.data && e.response.data.errors) {
                    errors.value = Object.values(e.response.data.errors)
                } else {
                    errors.value = e.response.data.message || ""
                }
            }
        }

        return {
            form,
            errors,
            handleLogin,
        }
    }
}
</script>
