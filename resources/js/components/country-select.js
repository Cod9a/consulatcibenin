export default () => ({
    items: [],
    value: null,
    selected: null,
    open: false,
    optionCount: null,
    activeDescendant: null,
    async init() {
        let response = await axios.get('/api/countries')
        this.items = response.data
        this.optionCount = this.items.length
        this.$watch('selected', _ => {
            if (!open) return

            if (this.selected === null) {
                this.activeDescendant = ''
                return
            }
        });
    },
    choose(option) {
        this.value = option
        this.open = false
        this.$dispatch('input', this.items[this.value])
    },
    onButtonClick() {
        this.selected = this.value
        this.open = true
        this.$nextTick(() => {
            this.$refs.listbox.focus()
            if (this.selected !== null)
                this.$refs.listbox.children[this.selected].scrollIntoView({ block: 'nearest' });
        });
    },
    onOptionSelect() {
        if (this.selected !== null) {
            this.value = this.selected
            this.$dispatch('input', this.items[this.value])
        }
        this.open = false
        this.$refs.button.focus()
    },
    onEscape() {
        this.open = false
        this.$refs.button.focus()
    },
    onArrowUp() {
        this.selected = this.selected - 1 < 0 ? this.optionCount : this.selected - 1;
        this.$refs.listbox.children[this.selected].scrollIntoView({ block: 'nearest' });
    },
    onArrowDown() {
        this.selected = this.selected + 1 > this.optionCount - 1 ? 0 : this.selected + 1;
        this.$refs.listbox.children[this.selected - 1].scrollIntoView({ block: 'nearest' });
    }
});
