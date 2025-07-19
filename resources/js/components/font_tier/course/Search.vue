<script setup>
import {onMounted, ref, watch} from 'vue';
import Axios from "@/http.js";

const props = defineProps({
    categories: Object,
    levels: Object,
    types: Object,
    data: String,
});

const selected_category_id = ref("");
const courses = ref([]);
const loading = ref(true);
const selected_types = ref([]);
const selected_levels = ref([]);
const selected_categories = ref([]);
const selected_limit = ref(10);
const search_data = ref(null);

onMounted( async () => {
    console.log(props);
    search_data.value = props.data;
    await getCourse();
});

const getCourse = async () => {
    loading.value = true;
    await Axios.get('/get-course?category_ids='+JSON.stringify(selected_categories.value)+'&level_ids='+JSON.stringify(selected_levels.value)+'&type_ids='+JSON.stringify(selected_types.value)+'&limit='+selected_limit.value+'&search='+search_data.value).then((response) => {
        if(response.status === 200) {
            courses.value = response.data;
            loading.value = false;
        }else{
            throw new Error('your response is not valid');
        }
    }).catch((error) => {
        throw new Error(error);
    })
}


watch(selected_types,getCourse);
watch(selected_categories,getCourse);
watch(selected_levels,getCourse);

</script>

<template>
    <!--start new section -->
    <div class="container py-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="course-category-sidebar">

                    <h6 class="mb-2">Course Types</h6>
                    <div class="form-check" v-for="(category_type,type_index) in props.types">
                        <input v-model="selected_types" class="form-check-input" type="checkbox" :id="`type_${type_index}`" :value="category_type.id">
                        <label class="form-check-label" :for="`type_${type_index}`">{{category_type.title}}</label>
                    </div>

                    <hr>
                    <h6 class="mb-2">Course Category</h6>
                    <div class="form-check" v-for="(category,cat_index) in props.categories">
                        <input v-model="selected_categories" class="form-check-input" type="checkbox" :id="`cat_${cat_index}`" :value="category.id">
                        <label class="form-check-label" :for="`cat_${cat_index}`">{{category.title}}</label>
                    </div>

                    <hr>
                    <h6 class="mb-2">Course Levels</h6>
                    <div class="form-check" v-for="(level,level_index) in props.levels">
                        <input v-model="selected_levels" class="form-check-input" type="checkbox" :id="`level_${level_index}`" :value="level.id">
                        <label class="form-check-label" :for="`level_${level_index}`">{{level.title}}</label>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-md-9">
                <div class="course-section-container">
                <div
                    v-if="loading"
                    class="d-flex justify-content-center align-items-center flex-column loading-design"
                >
                    <div class="spinner-border spinner-border-color" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3 spinner-border-color">Loading user data...</p>
                </div>
                <transition name="fade">
                <div class="row">

                    <template v-if="courses.length > 0">
                    <!--start Course card -->
                    <div class="col-md-4" v-for="course in courses" :key="course.id">
                        <div class="course-category-card">
                            <span v-if="course.fee == 0" class="course-category-free-label">Free Course</span>
                            <img :src="course.image" :alt="course.course_name">
                            <div class="course-category-card-body">
                                <div v-if="course.discount == 0" class="course-category-price">৳ {{ course.fee }}</div>
                                <div v-else>
                                    <span class="course-category-old-price">৳ {{course.fee}}</span>
                                    <span class="course-category-price">৳{{course.fee - course.discount}}</span>
                                </div>

                                <h6 class="course-category-name">{{course.course_name}}</h6>

                                <div class="course-category-footer">
                                    <span class="text-muted"><i class="fa-solid fa-signal"></i> {{course.course_level}}</span>
                                    <span class="course-category-stars">⭐ 4.8(10 reviews)</span>
                                </div>

                                <a :href="`/course-details/${course.slug}/${course.batch_number}`"> <button class="course-category-details-btn mt-2" style="width: 100%;margin-top: 20px !important;">বিস্তারিত দেখুন</button></a>
                            </div>
                        </div>
                    </div>
                    <!--start Course card -->
                    </template>
                    <template v-else>
                        <h2 class="not-found-text">Data not found</h2>
                    </template>
                    <!-- More courses can be added the same way -->
                </div>
                </transition>
                </div>
            </div>
        </div>
    </div>
    <!--end new section -->

</template>

<style scoped>
.activated{
    color: white !important;
    background-color: var(--brand-secondary-color) !important;
    border-color: var(--brand-secondary-color) !important;
}

.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s ease;
}
.fade-enter-from, .fade-leave-to {
    opacity: 0;
}
.fade-enter-to, .fade-leave-from {
    opacity: 1;
}

.not-found-text{
    text-align: center;
    color: silver;
    padding-top: 150px;
}

.course-section-container{
    position:relative;
    overflow:hidden;
    //padding:50px 0;
    //min-height: 300px;
}
.loading-design{
    position: absolute; top: 0; left: 0; width: 100%;
    min-height: 300px;
    height: 100%;
    background-color: white;
    z-index: 9999;
}

.spinner-border-color{
    color: var(--brand-primary-color) !important;
}



body {
    background-color: #f8f9fa;
}

.course-category-header {
    font-weight: bold;
    font-size: 22px;
    font-family: var(--font-primary);
}

.course-category-sidebar {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
}

.course-category-card {
    background: white;
    //border: 1px solid var(--brand-primary-color);
    border-radius: 8px;
    margin-bottom: 20px;
    overflow: hidden;
    position: relative;
    transition: all 0.2s;
    border:1px solid rgba(158,158,158,0.5);
    box-shadow: 0px 0px 11px 0px rgba(158,158,158,0.5);
    -webkit-box-shadow: 0px 0px 11px 0px rgba(158,158,158,0.5);
    -moz-box-shadow: 0px 0px 11px 0px rgba(158,158,158,0.5);
}

.course-category-card img {
    width: 100%;
    height: 170px;
    object-fit: cover;
}

.course-category-card-body {
    padding: 15px;
}

.course-category-price {
    font-size: 16px;
    font-weight: bold;
    color: var(--text-heading-color);
    margin-bottom: 5px;
    font-family: var(--font-primary);
}

.course-category-old-price {
    text-decoration: line-through;
    color: red;
    font-size: 14px;
    margin-right: 10px;
}

.course-category-free-label {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: red;
    color: white;
    font-size: 12px;
    padding: 2px 6px;
    border-radius: 4px;
}

.course-category-details-btn {
    font-size: 14px;
    padding: 6px 12px;
    background-color: var(--brand-secondary-color);
    color: white;
    border: 1px solid var(--brand-primary-color);
    border-radius: 4px;
}

.course-category-details-btn:hover {
    background-color: var(--brand-primary-color);
    color: white;
}

.course-category-footer {
    font-size: 12px;
    color: #333;
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.course-category-stars {
    color: #333;
}

.course-category-dropdown {
    font-size: 14px;
    padding: 6px 10px;
    border-radius: 5px;
}

.course-category-name{
    font-size: 18px;
    padding: 8px 0;
    font-weight: bold;
    font-family: var(--font-third);
}

</style>
