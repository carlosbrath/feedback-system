<template>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Feedbacks</h1>
            </div>
            <div class="col-4 text-right">
                <router-link class="btn btn-secondary ml-2" to="create">
                    Add Feedback
                </router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="blue-bg">
                        <tr>
                            <th>User</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Votes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(feedback, index) in feedbacks" :key="index">
                            <td>{{ feedback.user.name }}</td>
                            <td>{{ feedback.title }}</td>
                            <td>{{ feedback.category }}</td>
                            <td>{{ feedback.description }}</td>
                            <td>{{ feedback.votes }}</td>
                            <td>
                                <form method="post" @submit.prevent="handleVote">
                                    <button class="btn d-flex mr-3 btn-primary btn-info" type="submit">
                                        <span class="mr-3" id="icon"><i class="bi bi-hand-thumbs-up"></i></span><span id="count">{{ feedback.votes }}</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-7 offset-md-3">
                <div class="">
                    <span class="capitalize">Welcome {{ user && user.name }}, <button
                            class="text-orange-500 underline hover:no-underline rounded-md"
                            @click="handleLogout">Logout</button></span>
                    <h1 class="text-2xl"> Todo </h1>
                </div>
                <div class="d-flex">
                    <input type="text" class="" v-model="todo" placeholder="Enter your todo" />
                    <button class="btn btn-success" @click="addTodo">+</button>
                </div>
                <Loader v-if="isLoading" />
                <ul class="border-t mt-3 cursor-pointer">
                    <li :class="`py-3 border-b text-gray-600 ${val.has_completed ? 'line-through' : ''}`"
                        v-for="(val, idx) in todos" :key="idx">
                        <input type="checkbox" :checked="val.has_completed" @click="checked(val, idx)" />
                        <span @click="checked(val, idx)" class="pl-3">{{ val.title }} </span>
                        <button class="float-right bg-red-400 px-2 text-white font-bold rounded-md hover:bg-red-600"
                            @click="deleteTodo(val, idx)">&times;
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
import { ref, onMounted } from 'vue'
import { useRouter } from "vue-router";
import { request } from '../helper'
import Loader from '../components/Loader.vue';

export default {
    components: {
        Loader,
    },
    setup() {
        const todo = ref('')
        const todos = ref([])
        const feedbacks = ref([])
        const user = ref()
        const isLoading = ref()

        let router = useRouter();
        onMounted(() => {
            authentication()
            handleTodos()
        });

        const authentication = async () => {
            isLoading.value = true
            try {
                const req = await request('get', '/api/user')
                user.value = req.data
            } catch (e) {
                await router.push('/login')
            }
        }

        const handleTodos = async () => {
            try {
                const req = await request('get', '/api/feedback')
                feedbacks.value = req.data.data
            } catch (e) {
                await router.push('/')
            }
            isLoading.value = false
        }
        const handleVote = async () => {
            try {
                const req = await request('/api/feedback/upvote', form)
                if (req.data.message) {
                    isLoading.value = false
                    return alert(req.data.message)
                    // await router.push('/')
                }
            } catch (e) {
                return alert(e)
            }
        }
        
        const handleNewTodo = async (title) => {
            try {
                const data = { title: title }
                const req = await request('post', '/api/feedback', data)
                if (req.data.message) {
                    isLoading.value = false
                    return alert(req.data.message)
                }
                todos.value.push(req.data.data)
            } catch (e) {
                await router.push('/login')
            }
            isLoading.value = false
        }

        const handleLogout = () => {
            localStorage.removeItem('APP_DEMO_USER_TOKEN')
            router.push('/login')
        }

        const addTodo = () => {
            if (todo.value === "") {
                return alert("Todo cannot be empty");
            }
            isLoading.value = true
            handleNewTodo(todo.value)
            todo.value = ""
        }

        const checked = async (val, index) => {
            try {
                const data = { has_completed: !val.has_completed }
                const req = await request('put', `/api/feedback/${val.id}`, data)
                if (req.data.message) {
                    isLoading.value = false
                    return alert(req.data.message)
                }
                todos.value[index].has_completed = !val.has_completed
            } catch (e) {
                await router.push('/')
            }
            isLoading.value = false
        }

        const deleteTodo = async (val, index) => {
            if (window.confirm("Are you sure")) {
                try {
                    const req = await request('delete', `/api/feedback/${val.id}`)
                    if (req.data.message) {
                        isLoading.value = false
                        todos.value.splice(index, 1)
                    }
                } catch (e) {
                    await router.push('/login')
                }
                isLoading.value = false
            }
        }

        return {
            todo,
            todos,
            feedbacks,
            user,
            checked,
            addTodo,
            handleVote,
            isLoading,
            deleteTodo,
            handleLogout,
        }
    },
}
</script>
