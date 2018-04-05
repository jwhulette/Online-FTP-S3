<template>
    <div class="row">
        <div class="listing col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><input @change.prevent="toggleAll(!allSelected)" v-model="allSelected" type="checkbox"></th>
                        <th></th>
                        <th>Filename</th>
                        <th class="hide-mobile">Visibility</th>
                        <th class="hide-mobile text-right">Filesize</th>
                    </tr>
                    <tr  v-if="! isRootLevel">
                        <td>
                            <span v-if="! isRootLevel" class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
                        </td>

                        <td colspan="4">
                            <a v-if="! isRootLevel" href="#" @click.prevent="levelUp">One level up</a>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr is="file-list-entry" :item="item" v-for="(item, index) in listing" v-bind:key="index"></tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script type="text/babel">
    import FileListEntry from './FileListEntry.vue'
    import * as types from '../../store/types'
    import {
        mapActions,
        mapState
    } from 'vuex'
    export default {
        methods: {
            ...mapActions({
                levelUp: types.LEVEL_UP,
                toggleAll: types.TOGGLE_ALL
            }),
        },
        computed: {
            ...mapState({
                allSelected: state => state.allSelected,
                listing: state => state.files,
                path: state => state.path
            }),
            isRootLevel() {
                return this.path === '/';
            }
        },
        components: {
            FileListEntry
        }
    }
</script>

<style>
    .listing a {
        cursor: pointer;
    }
    .listing td:nth-child(1),
    .listing td:nth-child(2) {
        width: 10px;
    }
    @media screen and (max-width: 535px) {
        .hide-mobile {
            display: none;
        }
    }
</style>