<template>
    <div>
        <vue-cal :time="false" active-view="week" locale="ru" :events="events"/>
    </div>
</template>

<script>
    import VueCal from 'vue-cal'
    import 'vue-cal/dist/i18n/ru.js'
    import 'vue-cal/dist/vuecal.css'

    export default {
        components: { VueCal },
        data: () => ({
            trainers: null,
            events: []
        }),
        created() {
            axios.get(window.location.origin + '/calendar/getShedule')
                .then(res => {
                    const th = this
                    th.trainers = res.data

                    trainers.forEach(function (item, i) {
                        th.events.push({
                            start: '2020-06-' + i,
                            end: '2020-07-31',
                            title: '<b>Тренер: ' + item.trainer.full_name + '</b>',
                            content: 'Детей: ' + random(1, 3) + ' <br><i class="v-icon material-icons">pool</i>',
                            class: 'leisure'
                        })
                    })
                })
                .catch(err => console.log(err))
        },
        methods: {
            getShedule() {
                axios.get(window.location.origin + '/calendar/getShedule')
                    .then(res => {
                        console.log(res.data)
                        this.trainers = res.data
                    })
                    .catch(err => console.log(err))
            }
        }
    }
</script>

<style lang="stylus">
.vuecal__event.leisure {
    background-color: rgba(253, 156, 66, 0.9);
    border: 1px solid rgb(233, 136, 46);
    color: #fff;
}
.vuecal__event.sport {
    background-color: rgba(255, 102, 102, 0.9);
    border: 1px solid rgb(235, 82, 82);
    color: #fff;
}
</style>
