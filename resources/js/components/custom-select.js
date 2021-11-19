export default (_) => ({
    async init() {
        let response = await axios.get(`/api/countries`);
        this.items = response.data;
        this.value = 0;
        this.$dispatch('input', this.items[this.value]);
        this.optionCount = this.items.length,
        this.$watch('selected', _ => {
            if (!this.open) return

            if (this.selected === null) {
                this.activeDescendant = ''
                return
            }
        })
    },
    activeDescendant: null,
    optionCount: null,
    open: false,
    selected: null,
    value: null,
    items: [],
    choose(option) {
        this.value = option
        this.open = false
        this.$dispatch('input', this.items[this.value]);
    },
    onButtonClick() {
        this.selected = this.value
        this.open = true
        this.$nextTick(() => {
            this.$refs.listbox.focus()
        })
    },
    onOptionSelect() {
        if (this.selected !== null) {
            this.value = this.selected
            this.$dispatch('input', this.items[this.value]);
        }
        this.open = false
        this.$refs.button.focus()
    },
    onEscape() {
        this.open = false
        this.$refs.button.focus()
    },
    onArrowUp() {
        this.selected = this.selected - 1 < 0 ? this.optionCount : this.selected - 1
        this.$refs.listbox.children[this.selected].scrollIntoView({ block: 'nearest' })
    },
    onArrowDown() {
        this.selected = this.selected + 1 > this.optionCount - 1 ? 0 : this.selected
        this.$refs.listbox.children[this.selected].scrollIntoView({ block: 'nearest' })
    },
})
