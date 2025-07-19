<script setup>
const props = defineProps({
    properties: Object,
    propertyName:String,
    errorMessage:String,
});
</script>
<template>
    <div v-if="properties.hasOwnProperty(propertyName) && properties['propertyName'] !== ''">
        <div class="invalid-feedback"><i class="fas fa-exclamation-circle"></i> {{errorMessage}}</div>
    </div>
</template>
