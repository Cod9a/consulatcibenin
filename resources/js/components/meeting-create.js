export default (meetingDateUrl, meetingStoreUrl) => ({
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
    timeConfig: {
        meetingLength: 30,
        timeSlots: {
            1: [
                ["2021-10-07T07:00:00.000Z", "2021-10-07T11:00:00.000Z"],
                ["2021-10-07T13:30:00.000Z", "2021-10-07T16:00:00.000Z"],
            ],
            2: [
                ["2021-10-07T07:00:00.000Z", "2021-10-07T11:00:00.000Z"],
                ["2021-10-07T13:30:00.000Z", "2021-10-07T16:00:00.000Z"],
            ],
            3: [
                ["2021-10-07T07:00:00.000Z", "2021-10-07T11:00:00.000Z"],
                ["2021-10-07T13:30:00.000Z", "2021-10-07T16:00:00.000Z"],
            ],
            4: [
                ["2021-10-07T07:00:00.000Z", "2021-10-07T11:00:00.000Z"],
                ["2021-10-07T13:30:00.000Z", "2021-10-07T16:00:00.000Z"],
            ],
            5: [
                ["2021-10-07T07:00:00.000Z", "2021-10-07T11:00:00.000Z"],
                ["2021-10-07T13:30:00.000Z", "2021-10-07T16:00:00.000Z"],
            ],
            6: [["2021-10-07T07:00:00.000Z", "2021-10-07T13:00:00.000Z"]],
        },
    },
    setSelectedDate(date) {
        this.timeSelected = null;
        this.dateSelected = date;
        this.generateMeetingsForDate(date);
    },
    mergeTimeAndDate(dateDate, timeDate) {
        return new Date(
            dateDate.getFullYear(),
            dateDate.getMonth(),
            dateDate.getDate(),
            timeDate.getHours(),
            timeDate.getMinutes()
        );
    },
    async generateMeetingsForDate(date) {
        let slots = [];
        if (!(date.getDay() in this.timeConfig.timeSlots)) {
            this.timeSlots = [];
            return;
        }
        const response = await axios.get(
            `${meetingDateUrl}?date=${
                date.getFullYear() +
                "-" +
                (date.getMonth() + 1) +
                "-" +
                date.getDate()
            }`
        );
        let occupiedSlots = response.data.data.map((item) =>
            new Date(item).getTime()
        );
        for (let timeSlot of this.timeConfig.timeSlots[date.getDay()]) {
            let currentDate = this.mergeTimeAndDate(
                date,
                new Date(timeSlot[0])
            );
            const endingDate = this.mergeTimeAndDate(
                date,
                new Date(timeSlot[1])
            );
            while (currentDate < endingDate) {
                let occupied =
                    occupiedSlots.indexOf(currentDate.getTime()) !== -1;
                slots.push({ date: currentDate, occupied: occupied });
                currentDate = new Date(
                    currentDate.getTime() +
                        this.timeConfig.meetingLength * 60000
                );
            }
        }
        this.timeSlots = slots;
    },
    selectMeetingType(meetingType) {
        this.selectedMeetingType = meetingType;
        this.nextStep();
    },
    nextStep() {
        if (this.step < 2) {
            this.step += 1;
        }
    },
    prevStep() {
        if (this.step > 0) {
            this.step -= 1;
        }
    },
    sendInformations() {
        if (this.timeSelected === null) {
            this.$dispatch("notify", {
                message: "Choisissez une heure de rendez-vous",
            });
            return;
        }
        axios
            .post(`${meetingStoreUrl}`, {
                meeting_date: new Date(
                    this.dateSelected.getFullYear(),
                    this.dateSelected.getMonth(),
                    this.dateSelected.getDate(),
                    this.timeSelected.getHours(),
                    this.timeSelected.getMinutes()
                ),
                payment_token: this.transactionId,
            })
            .then((response) => {
                this.meeting = response.data;
                axios.get(`/api/meetings/${this.meeting.id}/qr-code`)
                    .then((response) => {this.qrCode = response.data; this.successModal = true})
            })
            .catch((e) => {
                if (e.response.status == 422) {
                    this.errors = e.response.data.errors;
                }
            });
    },
});

