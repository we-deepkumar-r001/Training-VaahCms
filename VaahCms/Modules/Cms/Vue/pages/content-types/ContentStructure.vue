<script src="./ContentStructureJs.js"></script>
<template>
    <div class="column" v-if="assets && item">

        <div class="columns">

            <div class="column">

                <div class="card">

                    <!--header-->
                    <header class="card-header">

                        <div class="card-header-title">
                            <span>Content Structure</span>
                        </div>


                        <div class="card-header-buttons">

                            <div class="field has-addons is-pulled-right">

                                <p class="control">
                                    <b-button icon-left="save"
                                              type="is-light"
                                              :loading="is_btn_loading"
                                              @click="storeGroups()">
                                        Save
                                    </b-button>
                                </p>

                                <p class="control">
                                    <b-button type="is-light"
                                              @click="resetActiveItem()"
                                              icon-left="times">
                                    </b-button>
                                </p>



                            </div>


                        </div>

                    </header>
                    <!--/header-->

                    <!--content-->
                    <div class="card-content"  style="max-height: 600px; overflow: auto;">


                        <div class="card" v-if="item.groups.length > 0"
                             v-for="(group,index) in item.groups">

                            <div class="card-header is-shadowless">

                                <div class="card-header-title">
                                    <span>{{$vaah.limitString(group.name, 20)}}</span>
                                </div>

                                <div class="card-header-buttons">

                                    <b-field>

                                        <b-switch v-model="group.is_repeatable" true-value=1>
                                            Is repeatable
                                        </b-switch>



                                    </b-field>


                                </div>

                                <div class="card-header-buttons">
                                    <b-field>
                                        <b-tooltip label="Copy Slug" type="is-dark">
                                            <p class="control">
                                                <b-button @click="$vaah.copy(group.slug)"
                                                >#{{group.id}}</b-button>
                                            </p>
                                        </b-tooltip>
                                        <b-tooltip label="Delete Group" type="is-dark">
                                            <p class="control">
                                                <b-button @click="deleteGroup(group, index)" icon-left="trash">
                                                </b-button>
                                            </p>
                                        </b-tooltip>


                                    </b-field>
                                </div>


                            </div>

                            <div class="card-content is-paddingless">

                                <div class="draggable">
                                    <draggable class="dropzone has-padding-15" :list="group.fields"
                                               :group="{name:'fields'}">
                                        <div v-if="group.fields.length>0"
                                             v-for="(field, f_index) in group.fields"
                                             :key="f_index">
                                            <div class="dropzone-field has-margin-bottom-10">
                                                <b-field class="is-marginless">
                                                    <p class="control drag">
                                                        <span class="button is-static">:::</span>
                                                    </p>

                                                    <p class="control " v-if="field.type">
                                                        <span class="button dropzone-field-label is-static">
                                                            {{field.type.name}}
                                                        </span>
                                                    </p>
                                                    <b-input v-model="field.name" expanded placeholder="Field Name">
                                                    </b-input>
                                                    <b-tooltip label="Copy Slug" type="is-dark">
                                                        <p class="control">
                                                            <b-button @click="$vaah.copy(field.slug)"
                                                            >#{{field.id}}</b-button>
                                                        </p>
                                                    </b-tooltip>

                                                    <b-tooltip label="Field Option" type="is-dark">
                                                        <p class="control">
                                                            <b-button icon-left="cog"
                                                                      @click="toggleFieldOptions($event)"></b-button>
                                                        </p>
                                                    </b-tooltip>

                                                    <b-tooltip label="Delete Field" type="is-dark">
                                                        <p class="control">
                                                            <b-button @click="deleteGroupField(group, f_index)"
                                                                      icon-left="trash"></b-button>
                                                        </p>
                                                    </b-tooltip>

                                                </b-field>
                                                <div class="dropzone-field-options" style="display: none">

                                                    <table class="table">

                                                        <tr v-if="!assets.non_repeatable_fields.includes(field.type.slug)">
                                                            <td width="180" >
                                                                Is repeatable
                                                            </td>
                                                            <td>
                                                                <b-switch v-model="field.is_repeatable" true-value=1
                                                                          type="is-success">
                                                                </b-switch>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td width="180" >
                                                                Is searchable
                                                            </td>
                                                            <td>
                                                                <b-switch v-model="field.is_searchable" true-value=1
                                                                          type="is-success">
                                                                </b-switch>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td >
                                                                Excerpt
                                                            </td>
                                                            <td>
                                                                <b-input maxlength="200" v-model="field.excerpt"
                                                                         type="textarea"></b-input>
                                                            </td>
                                                        </tr>


                                                        <template v-if="field.meta">

                                                            <tr v-for="(meta_item, meta_index) in field.meta"
                                                                v-if="(meta_index !== 'container_opening_tag'
                                                                    && meta_index !== 'container_closing_tag')
                                                                    || assets.non_repeatable_fields.includes(field.type.slug)
                                                                    || field.is_repeatable">

                                                                <td v-if="meta_index !== 'filter_id'
                                                                && meta_index !== 'display_column'
                                                                && meta_index !== 'options'"
                                                                    v-html="$vaah.toLabel(meta_index)"></td>

                                                                <td v-if="meta_index !== 'filter_id'
                                                                && meta_index !== 'display_column'
                                                                && meta_index !== 'options'">
                                                                    <div v-if="meta_index.includes('is_')">
                                                                        <b-checkbox v-model="field.meta[meta_index]">
                                                                            {{$vaah.toLabel(meta_index)}}
                                                                        </b-checkbox>
                                                                    </div>
                                                                    <div v-else-if="meta_index === 'option'">
                                                                        <b-taginput
                                                                                v-model="field.meta[meta_index]"
                                                                                ellipsis
                                                                                placeholder="Add a tag"
                                                                                aria-close-label="Delete this tag">
                                                                        </b-taginput>
                                                                    </div>
                                                                    <div v-else-if="meta_index === 'type'">

                                                                        <b-field>

                                                                            <b-select ref="select_relation"
                                                                                    expanded v-model="field.meta[meta_index]"
                                                                                      @input="onSelectType(field,field.meta[meta_index],index,f_index)"
                                                                                      placeholder="Select">
                                                                                <option :value=null>
                                                                                    Select
                                                                                </option>
                                                                                <option
                                                                                        v-for="(option, index) in assets.content_relations"
                                                                                        :value="option.name"
                                                                                        :key="index">
                                                                                    {{ option.name }}
                                                                                </option>
                                                                            </b-select>
                                                                        </b-field>

                                                                        <tree-select v-if="field.meta[meta_index]
                                                                        && $vaah.findInArrayByKey(
                                                                        assets.content_relations,'name', field.meta[meta_index])
                                                                        && $vaah.findInArrayByKey(
                                                                        assets.content_relations,'name', field.meta[meta_index])['options']"
                                                                                     v-model="field.meta['filter_id']"
                                                                                     placeholder="Select..."
                                                                                     :options="$vaah.findInArrayByKey(
                                                                        assets.content_relations,'name', field.meta[meta_index])['options']" >
                                                                        </tree-select>

                                                                    </div>
                                                                    <div v-else>
                                                                        <b-input v-model="field.meta[meta_index]"
                                                                                 type="text"></b-input>
                                                                    </div>

                                                                </td>
                                                            </tr>
                                                        </template>

                                                    </table>



                                                </div>
                                                </div>
                                        </div>

                                    </draggable>
                                </div>


                            </div>


                        </div>




                    </div>
                    <!--/content-->

                    <div class="card-footer">
                        <div class="card-footer-item">
                            <b-field >
                                <b-input v-model="new_group.name"
                                         @keyup.enter.native="addNewGroup"
                                         type="text"></b-input>
                                <p class="control">
                                    <b-button @click="addNewGroup"
                                    >
                                        Add Group
                                    </b-button>
                                </p>
                            </b-field>
                        </div>
                    </div>




                </div>

            </div>
            <div class="column is-4" >

                <div class="card">

                    <!--header-->
                    <header class="card-header">

                        <div class="card-header-title">
                            <span>Content Fields</span>

                        </div>


                    </header>
                    <!--/header-->

                    <!--content-->
                    <div class="card-content" style="max-height: 600px; overflow: auto;"
                         v-if="assets && assets.field_types">



                        <div class="draggable" >
                            <draggable :list="assets.field_types"
                                       :clone="cloneField"
                                       :group="{name:'fields', pull:'clone', put:false}"
                                       >

                                <div v-for="(field, index) in assets.field_types"
                                     :key="index">
                                    <b-field class="has-margin-bottom-5" expanded>
                                        <p class="control drag">
                                            <span class="button is-static">:::</span>
                                        </p>

                                        <p class="control drag">
                                            <span class="button is-static">{{field.name}}</span>
                                        </p>
                                    </b-field>

                                </div>

                            </draggable>
                        </div>

                    </div>
                    <!--/content-->





                </div>

            </div>


        </div>




    </div>
</template>
