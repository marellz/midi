<template>
  <layout-container class="py-20">
    <div class="flex align-center mb-10">
      <h1 class="text-4xl font-bold">
        {{ loan.name }}
      </h1>
      <div class="flex-auto flex justify-end space-x-2">
        <custom-button>Edit</custom-button>
        <custom-button>Delete</custom-button>
      </div>
    </div>

    <div>
      <div class="flex">
        <template v-for="(attr, index) in itemAttributes" :key="index">
          <p v-html="attr(loan[index])"></p>
          <span class="font-bold text-gray-300 px-3">|</span>
        </template>
      </div>
      <div class="mt-10">
        <p>
          {{ loan.details }}
        </p>
      </div>
    </div>
  </layout-container>

  <div>
    <layout-container>
      <custom-tabs :tabs="tabs">
        <template #tab-1>
          <custom-table
            :fields="requestsFields"
            :items="loanRequests"
          ></custom-table>
        </template>
        <template #tab-2>
          <custom-table
            :fields="activeFields"
            :items="activeLoans"
          ></custom-table>
        </template>
      </custom-tabs>
    </layout-container>
  </div>
</template>
<script setup>
definePageMeta({
  layout: "entity-dash",
});

const route = useRoute();
const entityId = route.params.id;
const loanId = route.params.loanId;
const itemAttributes = ref({
  min_amount: (d) => `Minimum ${d}`,
  max_amount: (d)=> `Maximum ${d}`,
  rate_pa: (d)=> `Rate ${d}% PA`,
});

const tabs = ref([
  {
    label: "Requests",
    key: "tab-1",
  },
  {
    label: "Active loans",
    key: "tab-2",
  },
]);

const requestsFields = ref([
  {
    label: "Member",
    key: "member_id",
  },
  {
    label: "Payment frequency",
    key: "payment_frequency_id",
  },
  {
    label: "Approved",
    key: "approved",
  },
  {
    label: "Amount requested",
    key: "principal_amount",
  },
]);
const activeFields = ref([
  {
    label: "Member",
    key: "member_id",
  },
  {
    label: "Amount payable",
    key: "amount_payable",
  },
  {
    label: "Per interval",
    key: "per_interval_payment",
  },
  {
    label: "Balance",
    key: "balance_due",
  },
  {
    label: "Start date",
    key: "start_date",
  },
  {
    label: "End date",
    key: "due_date",
  },
]);

const {
  data: {
    value: { loan, requests: loanRequests, active: activeLoans },
  },
} = await useCustomFetch(`/entities/${entityId}/loans/${loanId}`);
</script>
