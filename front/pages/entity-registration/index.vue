<template>
  <div>
    <layout-container class="py-10">
      <page-title>Create entity</page-title>
    </layout-container>
    <form @submit.prevent="newEntity">
      <layout-container>
        <form-step
          title="Entity Administrator"
          info="Information on who is in charge of the entity"
        >
          <div class="grid lg:grid-cols-2 gap-6">
              <form-input label="Your name"></form-input>
              <form-input label="Your email" type="email"></form-input>
            </div>
        </form-step>
        <form-step title="Entity Information" info="All information about this entity">
            <div class="grid lg:grid-cols-2 gap-6">
                <form-input label="Name"></form-input>
                <form-input label="Established"></form-input>
            </div>
            
        </form-step>
      </layout-container>
    </form>
  </div>
</template>
<script lang="ts" setup>
const entity = ref({});
const newEntity = async () => {};
</script>
