<template>
  <layout-container class="py-20">
    <div class="flex align-center mb-10">
      <h1 class="text-4xl font-bold">
        {{ loan.name }}
      </h1>
      <div class="flex-auto flex justify-end space-x-2">
        <custom-button color="outline-primary">Edit</custom-button>
        <custom-button>Delete</custom-button>
      </div>
    </div>

    <div>
      <div class="flex">
        <p class="font-medium text-gray-600">
          Borrow {{ loan.min_amount.toLocaleString() }} -
          {{ loan.max_amount.toLocaleString() }}
        </p>
        <span class="font-bold text-gray-300 px-3">|</span>
        <p class="font-medium text-gray-600">
          Rate - {{ loan.rate_pa }}% (per annum)
        </p>
        <span class="font-bold text-gray-300 px-3">|</span>
      </div>
      <div class="mt-10">
        <h1 class="font-medium text-gray-500 mb-3">Information</h1>
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
          <custom-table :fields="requestsFields" :items="loanRequests">
            <template #member="{ member }">
              <p class="font-medium">
                {{ member.name }}
              </p>

              <div class="text-gray-500 text-xs mt-1">
                <a
                  href="#"
                  v-for="(item, index) in [member.phone, member.email]"
                  :key="index"
                  class="px-1 first:border-l-0 first:pl-0 border-l"
                >
                  {{ item }}
                </a>
              </div>
            </template>
            <template #payment_frequency="{ payment_frequency }">
              <p>
                {{ payment_frequency.name }}
              </p>
            </template>
            <template #principal_amount="{ principal_amount }">
              <p class="font-medium">
                Ksh. {{ principal_amount.toLocaleString() }}
              </p>
            </template>
            <template #approved="{ approved }">
              <custom-status color="success" v-if="approved">
                <check-badge-icon class="h-4"></check-badge-icon>
                <span class="ml-2 font-medium"> Approved </span>
              </custom-status>
              <custom-status color="warning" v-else>
                <inbox-stack-icon class="h-4"></inbox-stack-icon>
                <span class="ml-2 font-medium"> Pending </span>
              </custom-status>
            </template>
            <template #actions="{ id, approved }">
              <div class="flex">
                <custom-button-action
                  class=""
                  v-if="!approved"
                  @click="approveLoan(id)"
                >
                  <span>Approve</span>
                  <check-icon class="h-4 ml-2" />
                </custom-button-action>
              </div>
            </template>
          </custom-table>
        </template>
        <template #tab-2>
          <custom-table :fields="activeFields" :items="activeLoans">
            <template #member="{ member }">
              <p class="font-medium">
                {{ member.name }}
              </p>

              <div class="text-gray-500 text-xs mt-1">
                <a
                  href="#"
                  v-for="(item, index) in [member.phone, member.email]"
                  :key="index"
                  class="px-1 first:border-l-0 first:pl-0 border-l"
                >
                  {{ item }}
                </a>
              </div>
            </template>

            <template
              #amount_payable="{
                amount_payable,
                per_interval_payment,
                intervals,
              }"
            >
              <p class="font-medium">
                Ksh. {{ amount_payable.toLocaleString() }}
              </p>
              <p class="text-sm text-gray-500 mt-1">
                <span>
                  (Ksh. {{ per_interval_payment.toLocaleString() }} x
                  {{ intervals }} months)
                </span>
              </p>
            </template>
            <template #balance_due="{balance_due}">
              <p>Ksh. {{ balance_due.toLocaleString() }}</p>
            </template>
          </custom-table>
        </template>
      </custom-tabs>
    </layout-container>
  </div>
</template>
<script setup>
import {
  CheckBadgeIcon,
  InboxStackIcon,
  CheckIcon,
} from "@heroicons/vue/24/solid";
definePageMeta({
  layout: "entity-dash",
});

const route = useRoute();
const entityId = route.params.id;
const loanId = route.params.loanId;

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
    key: "member",
  },
  {
    label: "Payment frequency",
    key: "payment_frequency",
  },
  {
    label: "Amount requested",
    key: "principal_amount",
  },
  {
    label: "Status",
    key: "approved",
  },
  {
    label: "Actions",
    key: "actions",
  },
]);

const activeFields = ref([
  {
    label: "Member",
    key: "member",
  },
  {
    label: "Principal Amount",
    key: "amount_payable",
  },
  // {
  //   label: "Per interval",
  //   key: "per_interval_payment",
  // },
  // {
  //   label: "Intervals",
  //   key: "intervals",
  // },
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

const approveLoan = (id) => {
  console.log(`Approve loan id ${id}`);
};
</script>
