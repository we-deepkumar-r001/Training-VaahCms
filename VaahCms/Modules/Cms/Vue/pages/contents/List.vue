<script src="./ListJs.js"></script>
<template>
    <div class="columns">

        <!--left-->
        <div class="column"
             :class="{'is-12': page.list_view == 'large',
                     'is-3': page.list_view == 'small',
                     }">

            <!--card-->
            <div class="card" v-if="page.assets && page.list">

                <!--header-->
                <div class="card-header">

                    <div class="card-header-title">
                        {{page.assets.content_type.name}}

                        <span v-if="page.list">
                                 &nbsp; ({{page.list.total}})
                        </span>
                    </div>

                    <div class="card-header-buttons">
                        <div class="field has-addons is-pulled-right">

                            <p class="control">
                                <b-button type="is-light"
                                          @click="toCreate()"
                                          icon-left="plus">
                                    Create
                                </b-button>
                            </p>
                            <div class="control">
                                <b-button type="is-light"
                                          @click="sync()"
                                          :loading="is_btn_loading"
                                          icon-left="redo-alt">
                                </b-button>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/header-->

                <!--content-->
                <div class="card-content">


                    <div class="block" >



                        <!--actions-->
                        <div class="level" v-if="page.list_view !='small'">

                            <!--left-->
                            <div class="level-left" >
                                <div  class="level-item" >
                                    <b-field >

                                        <b-select placeholder="- Bulk Actions -"
                                                  v-model="page.bulk_action.action">
                                            <option value="">
                                                - Bulk Actions -
                                            </option>
                                            <option v-for="option in page.assets.bulk_actions"
                                                    :value="option.slug"
                                                    :key="option.slug">
                                                {{ option.name }}
                                            </option>
                                        </b-select>

                                        <b-select placeholder="- Select Status -"
                                                  v-if="page.bulk_action.action == 'bulk-change-status'"
                                                  v-model="page.bulk_action.data">
                                            <option value="">
                                                - Select Status -
                                            </option>
                                            <option v-for="item in page.status_list" :value=item>
                                                {{item}}
                                            </option>
                                        </b-select>

                                        <p class="control">
                                            <button class="button is-primary"
                                                    @click="actions">
                                                Apply
                                            </button>
                                        </p>

                                    </b-field>
                                </div>
                            </div>
                            <!--/left-->


                            <!--right-->
                            <div class="level-right" >

                                <div class="level-item">

                                    <b-field>

                                        <b-input placeholder="Search"
                                                 type="text"
                                                 icon="search"
                                                 @input="delayedSearch"
                                                 @keyup.enter.prevent="delayedSearch"
                                                 v-model="query_string.q">
                                        </b-input>

                                        <p class="control">
                                            <button class="button is-primary"
                                                    @click="getList">
                                                Filter
                                            </button>
                                        </p>
                                        <p class="control" >
                                            <button class="button is-primary"
                                                    @click="resetPage">
                                                Reset
                                            </button>
                                        </p>
                                        <p class="control" >
                                            <button class="button is-primary"
                                                    @click="toggleFilters()"
                                                    slot="trigger">
                                                <b-icon icon="ellipsis-v"></b-icon>
                                            </button>
                                        </p>
                                    </b-field>

                                </div>

                            </div>
                            <!--/right-->

                        </div>
                        <!--/actions-->

                        <!--list-view-small-->
                        <div v-else class="level">
                            <b-input placeholder="Search"
                                     type="text"
                                     icon="search"
                                     @input="delayedSearch"
                                     @keyup.enter.prevent="delayedSearch"
                                     v-model="query_string.q">
                            </b-input>
                        </div>
                        <!--/list-view-small-->

                        <!--filters-->
                        <div class="level" v-if="page.show_filters">

                            <div class="level-left">


                                <div class="level-item">

                                    <b-field label="">
                                        <b-select placeholder="- Select a filter -"
                                                  v-model="query_string.filter"
                                                  @input="setFilter()">
                                            <option value="">
                                                - Select a filter -
                                            </option>

                                            <option v-for="item in page.status_list" :value=item>
                                                {{item}}
                                            </option>

                                        </b-select>
                                    </b-field>


                                </div>

                                <div class="level-item">

                                    <b-field label="">
                                        <b-select placeholder="- Sort by -"
                                                  v-model="query_string.sort_by"
                                                  @input="setFilter()">
                                            <option value="">
                                                -  Sort by -
                                            </option>
                                            <option value=id>
                                                Id
                                            </option>
                                            <option value=name>
                                                Name
                                            </option>
                                            <option value=status>
                                                status
                                            </option>
                                            <option value=updated_at>
                                                updated_at
                                            </option>

                                        </b-select>
                                    </b-field>


                                </div>
                                <div class="level-item">

                                    <b-field label="">
                                        <b-dropdown aria-role="list" @input="setFilter()" v-model="query_string.sort_order">
                                            <button class="button is-primary" type="button" slot="trigger">
                                                <span v-if="query_string.sort_order === 'desc'">Descending</span>
                                                <span v-else>Ascending</span>
                                            </button>

                                            <b-dropdown-item  value="desc">
                                                <span>Descending</span>
                                            </b-dropdown-item>
                                            <b-dropdown-item  value="asc">
                                                <span>Ascending</span>
                                            </b-dropdown-item>
                                        </b-dropdown>
                                    </b-field>


                                </div>

                                <div class="level-item">
                                    <div class="field">
                                        <b-checkbox v-model="query_string.trashed"
                                                    @input="getList"
                                        >
                                            Include Trashed
                                        </b-checkbox>
                                    </div>
                                </div>

                            </div>

                            <div class="level-right">

                                <div class="level-item">

                                    <b-field>
                                        <b-datepicker
                                            position="is-bottom-left"
                                            placeholder="- Select a dates -"
                                            v-model="selected_date"
                                            @input="setDateRange"
                                            range>
                                        </b-datepicker>
                                    </b-field>


                                </div>

                            </div>


                        </div>
                        <!--/filters-->


                        <!--list-->
                        <div class="block ">

                            <div class="block" style="margin-bottom: 0px;" >

                                <div v-if="page.list_view == 'small'">
                                    <ListSmallView @eReloadList="getList"/>
                                </div>

                                <div v-else-if="page.list_view == 'medium'">
                                    <ListMediumView @eReloadList="getList"/>
                                </div>

                                <div v-else>
                                    <ListLargeView @eReloadList="getList"/>
                                </div>

                            </div>

                            <hr style="margin-top: 0;"/>

                            <div class="block" v-if="page.list">
                                <b-pagination  :total="page.list.total"
                                               :current.sync="page.list.current_page"
                                               :per-page="page.list.per_page"
                                               range-before=3
                                               range-after=3
                                               @change="paginate">
                                </b-pagination>
                            </div>

                        </div>
                        <!--/list-->



                    </div>


                </div>
                <!--/content-->

            </div>
            <!--/card-->


        </div>
        <!--/left-->

        <router-view @eReloadList="getList"></router-view>

    </div>
</template>


