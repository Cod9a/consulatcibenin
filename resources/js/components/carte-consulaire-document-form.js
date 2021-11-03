import axios from 'axios';

export default (documentId) => ({
    step: 1,
    nSteps: 4,
    uniqueId: null,
    successModal: false,
    document: {},
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
        'genre': '',
        'mailbox': '',
        'spouse_name': '',
        'diploma': '',
        'father_first_name': '',
        'mother_first_name': '',
        'father_last_name': '',
        'mother_last_name': '',
        'arrival_date_ci': '',
        'residence_commune': '',
        'marital_situation': '',
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
        step++;
    },
    processPaymentKkpay(firstName, lastName, demandId, amountTotal, reason) {
        const data = { uniqueId: this.uniqueId, demandId: demandId, }
        openKkiapayWidget({
            amount: amountTotal,
            position: 'center',
            callback: `/api/payment`,
            data,
            theme: 'green',
            reason,
            sandbox: 'true',
            paymentmethod: '',
            name: lastName + ' ' + firstName,
            email,
            key: '206caa702ce811ecb30d13c7d805295f'
        });
        addSuccessListener(response => {
            console.log('Voila ' + response);
            response.transactionId;
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
                this.successModal = true;
            }
        } catch (e) {
            if (e.response.status === 422) {
                this.fieldErrors = e.response.data.errors;
            }
        }
    }
})
