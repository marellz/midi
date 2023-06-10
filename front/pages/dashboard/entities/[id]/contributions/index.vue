<template>
  <layout-container class="px-5 py-20">
    <h1 class="text-4xl font-bold">Contributions</h1>
  </layout-container>
  <div class="py-5">
    <layout-container class="px-5">
      <custom-alert type="error" v-if="error">
        <p>
          {{ error }}
        </p>
      </custom-alert>
    </layout-container>
  </div>
  <div>
    <layout-container class="px-5">
      <div class="flex flex-wrap">
        <div
          class="flex p-3"
          v-for="(cont, index) in entityContributions"
          :key="index"
        >
          <input
            type="radio"
            name="entity-contribution"
            v-model="activeEntityContribution"
            :value="cont.id"
            :id="`contribution-${cont.id}`"
          />
          <label :for="`contribution-${cont.id}`" class="ml-2">
            <p>
              {{ cont.name }}
              <span class="font-normal">(Ksh.{{ cont.amount }})</span>
            </p>
          </label>
        </div>
      </div>
    </layout-container>
    <!-- <div class="py-3">
      <layout-container class="px-5">
        <h1 class="text-lg font-bold">
          Contribution : {{ activeEntityContribution.name }} Ksh. (
          {{ activeEntityContribution.amount }} per
          {{ activeEntityContribution.payment_frequency_id }})
        </h1>
      </layout-container>
    </div> -->
    <layout-container class="px-5">
      <custom-table
        :loading="pending"
        :fields="fields"
        :items="memberContributions"
      >
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
        <template #amount="{ amount }">
          <p>Ksh. {{ amount.toLocaleString() }}</p>
        </template>
      </custom-table>
    </layout-container>
  </div>
</template>
<script setup>
definePageMeta({
  layout: "entity-dash",
});

const route = useRoute();
const error = ref(null);
const id = route.params.id;
const fields = ref([
  {
    label: "Member",
    key: "member",
  },
  {
    label: "Amount",
    key: "amount",
  },
  {
    label: "Transaction code",
    key: "transaction_code",
  },
  {
    label: "Date",
    key: "payment_date",
  },
  {
    label: "",
    key: "actions",
  },
]);

const {
  pending,
  data: {
    value: {
      contributions: entityContributions,
      member_contributions: memberContributions,
    },
  },
} = await useCustomFetch(`/entities/${id}/entity-contributions`);

const activeEntityContribution = ref(entityContributions[0].id);
// const memberContributions = computed(
//   () =>
//     entityContributions.find(
//       (entity) => entity.id === activeEntityContribution.value
//     ).member_contributions
// );

// useCustomFetch(`/entities/${id}/entity-contributions`).then(res=>console.log(res.data.value));
// const activeEntityContribution = ref(entityContributions[0]);

// const { data: memberContributions } = await useAsyncData(
//   "memberContributions",
//   () =>
//     useFetch(`/entities/${id}/entity-contributions/${1}/member-contributions`, {
//       baseURL: config.public.API_URL,
//     }),
//   {
//     watch: [activeEntityContribution],
//   }
// );
</script>
