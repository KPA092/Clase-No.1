import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select'

import TheBookList from './components/Books/TheBookList.vue'
import TheCategoryList from './components/Category/TheCategoryList.vue'
import BackendError from './components/Components/BackendError.vue'

const app = createApp({
	components: {
		TheBookList,
		TheCategoryList
	}
})

app.component('v-select', vSelect)
app.component('BackendError', BackendError)
app.mount('#app')
