<template>
    <div>
        <h2 class="text-center mb-4 mt-4">{{ this.title }}</h2>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="form-group mb-4">
                    <select name="hotel" id="hotel" class="form-control" v-model="hotel" @change="pushHotel">
                        <option :value="null" disabled selected>{{ $t('hotels.choose') }}</option>
                        <option v-for="hotel in hotels" :key="hotel.hash" :value="hotel.hash">
                            {{ hotel.business_name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="form-group mb-4">
                    <select name="type" id="type" class="form-control" v-model="type" @change="pushType">
                        <option :value="null" disabled selected>{{ $t('transactions.select.type') }}</option>
                        <option v-for="(type, index) in typesList" :key="index" :value="type.value">
                            {{ type.description }}
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            hotel: null,
            type: null
        }
    },
    props: ['title', 'hotels', 'types'],
    methods: {
        pushHotel() {
            this.$emit('selectHotel', this.hotel)
        },
        pushType() {
            this.$emit('selectType', this.type)
        }
    },
    computed: {
        typesList: function () {
            return _.filter(this.types, type => {
                return this.$root.$can(type.permission)
            })
        }
    },
}
</script>