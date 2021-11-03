export default () => ({
    init() {
        this.activeMonth = new Date().getMonth() + 1;
        this.activeYear = new Date().getFullYear();
        this.loadDaysForMonth();
    },
    activeMonth: 10,
    activeYear: 2021,
    days: ["Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"],
    months: [
        "Janvier",
        "Fevrier",
        "Mars",
        "Avril",
        "Mai",
        "Juin",
        "Juillet",
        "Aout",
        "Septembre",
        "Octobre",
        "Novembre",
        "Decembre",
    ],
    calendarDays: [],
    selectedDate: new Date(),
    prevMonth() {
        let month = this.activeMonth - 1;
        let year = month === 0 ? this.activeYear - 1 : this.activeYear;
        month = month === 0 ? 12 : month;
        this.activeMonth = month;
        this.activeYear = year;
        this.loadDaysForMonth();
    },
    nextMonth() {
        let month = this.activeMonth;
        let year = month + 1 > 12 ? this.activeYear + 1 : this.activeYear;
        month = (month % 12) + 1;
        this.activeMonth = month;
        this.activeYear = year;
        this.loadDaysForMonth();
    },
    loadDaysForMonth() {
        let firstDayOfCalendar = new Date(
            this.activeYear,
            this.activeMonth - 1,
            1
        );
        let lastDayOfCalendar = new Date(this.activeYear, this.activeMonth, 0);
        this.calendarDays = this.extractDaysBetweenDates(
            firstDayOfCalendar,
            lastDayOfCalendar
        );
    },
    extractDaysBetweenDates(firstDate, lastDate) {
        let dates = [];
        let currentDate = firstDate;
        while (currentDate <= lastDate) {
            dates.push(new Date(currentDate));
            currentDate.setDate(currentDate.getDate() + 1);
        }
        return dates;
    },
    select(date) {
        this.selectedDate = date;
        this.$dispatch("selected", this.selectedDate);
    },
    isSelected(date) {
        return (
            this.selectedDate.getMonth() === date.getMonth() &&
            this.selectedDate.getFullYear() === date.getFullYear() &&
            this.selectedDate.getDate() === date.getDate()
        );
    },
});
