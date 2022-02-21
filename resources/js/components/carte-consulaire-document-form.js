import axios from 'axios';

export default (documentId, callbackUrl) => ({
    step: 1,
    nSteps: 6,
    uniqueId: null,
    successModal: false,
    document: {},
    visited: [true, false, false, false, false, false],
    errors: [false, false, false, false, false, false],
    async init() {
        let response = await axios.get(`/api/documents/${documentId}`);
        if (response.status >= 200 && response.status <= 299) {
            this.document = response.data;
        }
    },
    fieldErrors: {
        'photo': '',
        'certificate': '',
        'ID': '',
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
        'enrollment_time': '',
        'enrollment_date': '',
        'rdv': '',
        'ship': '',
    },
    fields: {
        'photo': '',
        'certificate': '',
        'ID': '',
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
        'enrollment_time': '',
        'enrollment_date': '',
        'rdv': '',
        'ship': '',
    },
    nextStep() {
        if (this.validateFields()) {
            this.visited[this.step++] = true;
        }
    },
    formatted(date) {
        if(date != '') {
            const upDate = new Date(date) 
            return ("0" + upDate.getDate()).slice(-2) + '/' + ("0" + (upDate.getMonth() + 1)).slice(-2) + '/' + upDate.getFullYear() 
        }
    },
    validateFields() {
        let value = true;
        let getPhone = null;
        const result = this.$refs.form.querySelectorAll('fieldset');

        if(this.step === 5) {
            const enrollment_date = document.querySelector('#enrollment_date')
            const enrollment_time = document.querySelector('#enrollment_time')
            let champs = result[4].querySelectorAll('input,textarea')
            for (const c of champs) {
                if(c.getAttribute('name') === 'rdv' && c.checked) {
                    let splitTime = enrollment_time.value.split(':')
                    let splitDate = enrollment_date.value.split('-')
                    if(splitDate[0] && splitDate[1] && splitDate[2]) {
                        let getDate = new Date(enrollment_date.value)
                        let getDay = new Date()
                        if(getDay.getDay() === 3 || getDay.getDay() === 4 || getDay.getDay() === 5)
                            getDay.setDate(getDay.getDate() + 4)
                        else
                            getDay.setDate(getDay.getDate() + 2)
                        if(getDate >= getDay) {
                            if(splitTime[0] && splitTime[1]) {
                                if(parseInt(splitTime[0]) < 8 || parseInt(splitTime[0]) > 11) {
                                    alert('Les heures d\'enrôlement sont comprises entre 08h et 11h30')
                                    value = false
                                } else {
                                    if(parseInt(splitTime[0]) === 11) {
                                        if(parseInt(splitTime[1]) > 30) {
                                            alert('Nous ne recevons pas au delà de 11h30 pour les enrôlements')
                                            value = false
                                        } else {
                                            value = true
                                            this.document.price += 2000
                                        }
                                    }
                                }
                            } else {
                                alert('Veuillez définir l\'heure')
                                value = false
                            }
                        } else {
                            value = false
                            alert('Enrôlement à compter de deux jours ouvrables de la demande!')
                        }
                    } else {
                        value = false
                        alert('Revoyez la date svp!')
                    }
                }

                if(c.getAttribute('name') === 'ship' && c.checked) {
                    this.document.price += 1000
                }
            }
        }

        let fields = result[this.step - 1].querySelectorAll('[required]');
        for (const f of fields) {
            if (f.value === '' || f.value === undefined || f.value === null) {
                this.fieldErrors[f.getAttribute('name')] = `Ce champs est obligatoire`;
                value = false;
            } else {
                if(f.type === 'email' && f.value.length > 0) {
                    console.log('Oups')
                    let email = f.value.toLowerCase();
                    if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                        this.fieldErrors[f.getAttribute('name')] = ''
                    } else {
                        this.fieldErrors[f.getAttribute('name')] = `L'adresse email n'est pas valide`;
                        value = false;
                    }
                } else {
                    this.fieldErrors[f.getAttribute('name')] = '';
                }
            }
            if(f.getAttribute('name') === 'phone' || f.getAttribute('name') === 'phone_alt' || f.getAttribute('name') === 'benin_contact_phone' || f.getAttribute('name') === 'ci_contact_phone') {
                getPhone = f.value.split(" ")[1];
                if(getPhone.length < 8) {
                    this.fieldErrors[f.getAttribute('name')] = `Revoyez svp ce champs`;
                    value = false;
                } else {
                    if(isNaN(parseFloat(getPhone)) || !isFinite(getPhone)) {
                        this.fieldErrors[f.getAttribute('name')] = `Ce champs n'est pas correcte`;
                        value = false;
                    } else {
                        this.fieldErrors[f.getAttribute('name')] = '';
                    }
                }
            }
            if(f.type === 'date') {
                if(f.getAttribute('name') === 'birthdate') {
                    let today = new Date();
                    let splitDate = f.value.split('-')
                    let year = splitDate[0];
                    let month = splitDate[1] - 1;
                    let day = splitDate[2];
                    let age = today.getFullYear() - year;
                    if (age < 18) {
                        this.fieldErrors[f.getAttribute('name')] = `Vous n'êtes pas majeur!`;
                        value = false;
                    } else {
                        this.fieldErrors[f.getAttribute('name')] = '';
                    }
                } else {
                    let yester = new Date();
                    yester.setDate(yester.getDate() - 1)
                    let splitDate = f.value.split('/')
                    let date = Date.parse(splitDate[0], splitDate[1] - 1, splitDate[2]);
                    if(date >= yester) {
                        this.fieldErrors[f.getAttribute('name')] = `Ce champs doit être antérieur à aujourd'hui`;
                        value = false;
                    } else {
                        this.fieldErrors[f.getAttribute('name')] = '';
                    }
                }
            }
            
            if(f.type === 'number') {
                // if(parseInt(f.value) > 30) {
                //     this.fieldErrors[f.getAttribute('name')] = `Euh!`;
                //     value = false;
                // } else {
                    if(parseInt(f.value) < 0) {
                        this.fieldErrors[f.getAttribute('name')] = `Champs incorrecte!`;
                        value = false;
                    } else {
                        this.fieldErrors[f.getAttribute('name')] = ''
                    }
                // }
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
                // for (const [key, _] of Object.entries(this.fieldErrors)) {
                //     const item = document.querySelector(`[name=${key}]`);
                //     const fieldset = item.closest('fieldset');
                //     if (fieldset) {
                //         const value = fieldset.getAttribute("data-step");
                //         this.errors[value - 1] = true;
                //     }
                // }
            }
        }
    }
})
