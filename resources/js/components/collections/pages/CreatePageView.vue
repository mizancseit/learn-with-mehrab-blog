<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

let modal = ref(null);
let add_row_col_modal = ref(null);


const path = ref("");
const page_id = ref(1);
const section_id = ref('');

onMounted(() => {
    modal.value = new bootstrap.Modal(document.getElementById('add-section'));
    add_row_col_modal.value = new bootstrap.Modal(document.getElementById('add-row-col-modal'));
    path.value = "http://localhost:8000/admin/";
    loadSections();
});

const openAddSectionModal = async () => {
    modal.value = new bootstrap.Modal(document.getElementById('add-section'));
    modal.value.show();
};

const sectionLists = ref([]);
const loadSections = async () => {
    try {
        const response = await axios.get(path.value + 'get-sections/'+page_id.value);
        if (response.status !== 200) {
            throw new Error('Failed to save data');
        }

        sectionLists.value = response.data.data;

        console.log("respose from backend");
        console.log(sectionLists.value);

        //savedMessage.value = 'Data saved successfully!';
    } catch (error) {
        // errorMessage.value = error.message;
    }
}

const addSectionState = {
    title: "",
    page_id: "1",
    section_name: "",
    height: "",
    width: "",
    padding: "",
    margin: "",
    container: "",
    custom_css: "",
    order_by: 0,
    bg_color: "",
};
const handleSection = async () => {
    try {
        const response = await axios.post(path.value + 'add-section', addSectionState);

        console.log("from response");
        console.log(response);

        if (response.status !== 200) {
            throw new Error('Failed to save data');
        }

        loadSections();
        alert("data saved successfully");

        //savedMessage.value = 'Data saved successfully!';
    } catch (error) {
       // errorMessage.value = error.message;
    } finally {
       // loading.value = false;
    }
}



const openAddRowColModal = async (section_id_local) => {
    section_id.value = section_id_local;
    rowColState.section_id = section_id_local;
    add_row_col_modal.value = new bootstrap.Modal(document.getElementById('add-row-col-modal'));
    add_row_col_modal.value.show();
};



const rowColState = {
    col_count: 2,
    col_data: "",
    section_id: section_id.value,
    page_id: page_id.value,
    row_id:0,
    order_by: 0
}

const handleRowCol = async () => {
    try {
        const response = await axios.post(path.value + 'add-row-col', rowColState);

        console.log("from response");
        console.log(response);

        if (response.status !== 200) {
            throw new Error('Failed to save data');
        }

        loadSections();
        alert("data saved successfully");

        //savedMessage.value = 'Data saved successfully!';
    } catch (error) {
        // errorMessage.value = error.message;
    } finally {
        // loading.value = false;
    }
}


</script>
<template>
    <div>

        <!--start loading section-->
        <div v-for="(item, index) in sectionLists" :key="index">

            <div class="row">
                <div class="col-md-8">
                    Section Name: {{item.section_name}}
                </div>
                <div class="col-md-4">
                    <div style="text-align: right">
                        <a href="" style="font-size: 16px;margin-right: 10px;color: #79c8df"><i class="fa fa-eye"></i> </a>
                        <a href="" style="font-size: 16px;margin-right: 10px;color: blueviolet"><i class="fa fa-edit"></i></a>
                        <a href="" style="font-size: 16px;margin-right: 10px;color: darkred"><i class="fa fa-trash"></i> </a>
                    </div>
                </div>
            </div>


            <div class="card" style="margin-bottom: 10px">
                <div class="card-body">
                    <h3>{{item.id}}</h3>
                </div>

                <hr style="margin-bottom: 0px"/>
                <!-- start add row and column -->
                <div class="card-body" style="text-align: center;">
                    <button type="button" class="btn btn-info" @click="openAddRowColModal(item.id)">
                        <i class="fa fa-plus"></i> Add Row and Column
                    </button>
                </div>
                <!--end add section -->
            </div>

        </div>
        <!--end loading section-->

        <!--start add section -->
        <div class="card">
            <div class="card-body" style="text-align: center;">
                <button type="button" class="btn btn-primary" @click="openAddSectionModal">
                    <i class="fa fa-plus"></i> Add Section
                </button>
            </div>
            <div class="modal fade" id="add-section" tabindex="-1" aria-labelledby="addSectionModalLabel" aria-hidden="true" ref="modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSectionModalLabel">Create Page Section</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post" @submit.prevent="handleSection">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 page-form-input-margin-bottom">
                                        <label class="">Section Title</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Section name" v-model="addSectionState.title">
                                    </div>

                                    <div class="col-md-6 page-form-input-margin-bottom">
                                        <label class="">Section Name</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Section name" v-model="addSectionState.section_name">
                                    </div>

                                    <div class="col-md-6 page-form-input-margin-bottom">
                                        <label class="">Container</label>
                                        <select class="form-control form-control-sm" v-model="addSectionState.container">
                                            <option value="">Choose</option>
                                            <option value="container">Container</option>
                                            <option value="container-fluid">Container Fluid</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 page-form-input-margin-bottom">
                                        <label class="">Width</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Width" v-model="addSectionState.width">
                                        <span class="example-text">Example: 100px</span>
                                    </div>

                                    <div class="col-md-6 page-form-input-margin-bottom">
                                        <label class="">Height</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Height" v-model="addSectionState.height">
                                        <span class="example-text">Example: 100px</span>
                                    </div>

                                    <div class="col-md-6 page-form-input-margin-bottom">
                                        <label class="">Padding</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Padding" v-model="addSectionState.padding">
                                        <span class="example-text">Example: 10px 0 10px 0</span>
                                    </div>

                                    <div class="col-md-6 page-form-input-margin-bottom">
                                        <label class="">Margin</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Margin" v-model="addSectionState.margin">
                                        <span class="example-text">Example: 10px 0 10px 0</span>
                                    </div>

                                    <div class="col-md-6 page-form-input-margin-bottom">
                                        <label class="">Bg Color</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Bg Color" v-model="addSectionState.bg_color">
                                        <span class="example-text">Example: #ffffff</span>
                                    </div>

                                    <div class="col-md-6 page-form-input-margin-bottom">
                                        <label class="">Sorting</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Sorting" v-model="addSectionState.order_by">
                                        <span class="example-text">Example: 0/1/2/3</span>
                                    </div>

                                    <div class="col-md-12 page-form-input-margin-bottom">
                                        <label class="">Custom CSS</label>
                                        <textarea rows="5" type="text" class="form-control form-control-sm" placeholder="Custom CSS" v-model="addSectionState.custom_css"></textarea>
                                    </div>

                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end add section -->



        <!--start row and column added modal -->
        <div class="modal fade" id="add-row-col-modal" tabindex="-1" aria-labelledby="addRowColModalLabel" aria-hidden="true" ref="add_row_col_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addRowColModalLabelLabel">Create Row Column</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post" @submit.prevent="handleRowCol">
                        <div class="modal-body">

                            <div class="" style="text-align: right">
                                <button class="btn btn-primary" style="margin-right: 10px"><i class="fa fa-plus"></i> </button>
                                <button class="btn btn-danger"><i class="fa fa-minus"></i> </button>
                            </div>

                            <div class="row">
                                <div class="col-md-12 page-form-input-margin-bottom">
                                    <label class="">Column Count</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Section name" v-model="rowColState.col_count">
                                </div>

                                <div class="col-md-12 page-form-input-margin-bottom">
                                    <label class="">Column Content</label>
                                    <textarea rows="10" type="text" class="form-control form-control-sm" placeholder="Custom CSS" v-model="rowColState.col_data"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end row and column added modal -->

    </div>
</template>

<style>
.page-form-input-margin-bottom{
    margin-bottom: 20px;
}
</style>
