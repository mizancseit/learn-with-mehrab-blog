<script setup>
const props = defineProps({
    errors: Object,
    propertyName:String
});
</script>
<template>
    <div v-if="errors.hasOwnProperty(propertyName)">
        <div class="invalid-feedback" v-for="error_item of errors[propertyName]"><i class="fas fa-exclamation-circle"></i> {{error_item}}</div>
    </div>
</template>
