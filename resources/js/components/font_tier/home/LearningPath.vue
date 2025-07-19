<script setup>
import {onMounted, ref} from 'vue';
import Axios from "@/http.js";

const props = defineProps({
    categories: Object
});

// defineProps({
//     categories: {
//         type: String,
//         default: 'Default Message'
//     },
//     count: {
//         type: Number,
//         default: 0
//     }
// });

const selected_category_id = ref("");
const courses = ref([]);
const loading = ref(true);

onMounted(async () => {
    $('.career-path-category-carousel-container').owlCarousel({
        loop:true,
        margin:4,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:true,
                loop:false
            }
        }
    });
    await getCourse();
});

const getCourse = async () => {
    loading.value = true;
    await Axios.get('/get-homepage-course?category_id='+selected_category_id.value).then((response) => {
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

const changeCourseByCategory = async (category_id) =>{
    selected_category_id.value = category_id;
    await getCourse();
}

</script>

<template>
    <!--start course category -->
    <div class="owl-carousel owl-theme career-path-category-carousel-container">
        <div v-for="item in categories" class="item">
            <button :class="{activated: item.id == selected_category_id}" @click.prevent="changeCourseByCategory(item.id)" type="button">{{item.title}}</button>
        </div>
    </div>
    <!--end course category -->

    <!-- Course Cards -->
    <div class="margin-top-40 course-section-container">
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
        <div  class="row g-4 justify-content-center" style="position:relative;">
            <!-- Repeatable Card -->
                    <div v-for="course in courses" class="col-md-3 col-sm-6">
                        <div class="card h-100 course-card">
                            <img :src="course.image" class="card-img-top" :alt="course.course_name">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <p class="fw-bold text-center">{{course.course_name}}</p>
                                <a :href="course.link" class="btn btn-danger w-100">See Details →</a>
                            </div>
                        </div>
                    </div>
            <!-- Duplicate the card for more -->
        </div>
    </transition>
    </div>

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

.course-section-container{
    position:relative;
    overflow:hidden;
    padding:50px 0;
    min-height: 300px;
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
</style>
