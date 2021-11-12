import axios from 'axios';

export default (documentId, callbackUrl) => ({
    step: 1,
    nSteps: 4,
    uniqueId: null,
    successModal: false,
    document: {},
    visited: [true, false, false, false],
    errors: [false, false, false, false],
    async init() {
        let response = await axios.get(`/api/documents/${documentId}`);
        if (response.status >= 200 && response.status <= 299) {
            this.document = response.data;
        }
    },
    fieldErrors: {
        'photo': '',
        'first_name': '',
        'last_name': '',
        'birthdate': '',
        'origin_country': '',
        'origin_commune': '',
        'job': '',
        'phone': '',
        'phone_alt': '',
        'email': '',
        'genre': '',
        'mailbox': '',
        'spouse_name': '',
        'diploma': '',
        'father_first_name': '',
        'mother_first_name': '',
        'father_last_name': '',
        'mother_last_name': ``,
        'ethnic_grp': '',
        'arrival_date_ci': '',
        'residence_commune': '',
        'marital_situation': '',
        'n_children': '',
        'ravip_number': '',
        'benin_contact_fullname': '',
        'ci_contact_fullname': '',
        'benin_contact_phone': '',
        'ci_contact_phone': '',
        'eye_color': '',
        'hair_color': '',
        'complexion_color': '',
        'other_signs': '',
        'height': '',
    },
    fields: {
        'photo': null,
        'first_name': '',
        'last_name': '',
        'birthdate': '',
        'origin_country': '',
        'job': '',
        'phone_alt': '',
        'email': '',
        'genre': 'male',
        'mailbox': '',
        'spouse_name': '',
        'diploma': '',
        'father_first_name': '',
        'mother_first_name': '',
        'father_last_name': '',
        'mother_last_name': '',
        'arrival_date_ci': '',
        'residence_commune': '',
        'marital_situation': 'single',
        'n_children': 0,
        'ravip_number': '',
        'benin_contact_fullname': '',
        'ci_contact_fullname': '',
        'benin_contact_phone': '',
        'ci_contact_phone': '',
        'eye_color': '',
        'hair_color': '',
        'complexion_color': '',
        'other_signs': '',
        'height': 0,
    },
    nextStep() {
        if (this.validateFields()) {
            this.visited[this.step++] = true;
        }
    },
    validateFields() {
        let value = true;
        const result = this.$refs.form.querySelectorAll('fieldset');
        let fields = result[this.step - 1].querySelectorAll('input[required]');
        for (const f of fields) {
            if (f.value === '' || f.value === undefined || f.value === null) {
                this.fieldErrors[f.getAttribute('name')] = `Le champs ${f.getAttribute('name').replace('_', ' ')} est obligatoire`;
                value = false;
            }
        }
        return value;
    },
    processPaymentKkpay(demandId, amountTotal, reason) {
        const data = { uniqueId: this.uniqueId, demandId: demandId }
        console.log(data);
        openKkiapayWidget({
            amount: amountTotal,
            position: 'center',
            callback: `${callbackUrl}`,
            theme: 'green',
            sandbox: 'true',
            key: '206caa702ce811ecb30d13c7d805295f',
            data,
            reason
        });
    },
    async onSubmit() {
        const formData = new FormData();
        for (const [key, value] of Object.entries(this.fields)) {
            formData.append(key, value);
        }
        try {
            let response = await axios.post(`/api/documents/${documentId}/demands`, formData,{
                headers: {
                    'Content-Type' : 'multipart/form-data',
                    },
                });
            if (response.status >= 200 && response.status <= 299) {
                this.uniqueId = response.data.payment_token;
                this.processPaymentKkpay(response.data.demandId, this.document.price, this.document.title);
            }
        } catch (e) {
            if (e.response.status === 422) {
                this.fieldErrors = e.response.data.errors;
                for (const [key, _] of Object.entries(this.fieldErrors)) {
                    const item = document.querySelector(`[name=${key}]`);
                    const fieldset = item.closest('fieldset');
                    if (fieldset) {
                        const value = fieldset.getAttribute("data-step");
                        this.errors[value - 1] = true;
                    }
                }
            }
        }
    }
})
