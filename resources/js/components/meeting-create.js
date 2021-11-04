export default (meetingDateUrl, meetingStoreUrl, callbackUrl) => ({
    step: 0,
    meetingTypes: [
        "Empreintes biometriques & signature electronique",
        "Retrait de documents",
    ],
    selectedMeetingType: null,
    transactionId: null,
    dateSelected: new Date(),
    timeSelected: null,
    timeSlots: [],
    errors: {},
    errorPopUp: false,
    successModal: false,
    qrCode: null,
    setSelectedDate(date) {
        this.dateSelected = date;
    },
    processPaymentKkpay(demandId, amountTotal, reason) {
        const data = { uniqueId: this.uniqueId, demandId: demandId }
        openKkiapayWidget({
            amount: amountTotal,
            position: 'center',
            callback: callbackUrl,
            theme: 'green',
            sandbox: 'true',
            key: '206caa702ce811ecb30d13c7d805295f',
            data,
            reason
        });
    },
    async sendInformations() {
        try {
            let response = await axios
                .post(`${meetingStoreUrl}`, {
                    meeting_date: this.dateSelected,
                    payment_token: this.transactionId,
                })
            if (response.status >= 200 && response.status < 300) {
                this.meeting = response.data;
                this.uniqueId = this.meeting.id;
                this.processPaymentKkpay(response.data.id, 2000, 'Rendez-vous')
            }
        } catch(error) {
            console.log(error)
            if (error.response && error.response.status == 422) {
                this.errors = error.response.data.errors;
            }
        }
    }
});

