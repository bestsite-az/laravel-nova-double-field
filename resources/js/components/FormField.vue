<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <input
                :id="field.name"
                type=number
                step=0.01
                :max="field.max"
                min="0"
                class="w-full form-control form-input form-input-bordered"
                :class="errorClasses"
                :placeholder="field.name"
                v-model="value"
                @input="validation"
                @blur="validation"
            />
            <p v-if="message" class="my-2 text-danger">{{message}}</p>
            <p v-if="field.info" class="my-2">{{field.info}}</p>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    data: function () {
        return {
            message: ''
        }
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        },

        validation() {
            if (this.field.max && this.value > this.field.max){
                this.message = 'No more than ' + this.field.max;
                this.value = this.field.max;
            }
            else
                this.message = '';
        }
    },
}
</script>
