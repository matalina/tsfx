<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': this.fields.title && this.fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.item.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': this.fields.title && this.fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.item.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': this.fields.name && this.fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.item.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': this.fields.name && this.fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.item.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': this.fields.description && this.fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.item.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="'required'" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('storable_id'), 'has-success': this.fields.storable_id && this.fields.storable_id.valid }">
    <label for="storable_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.item.columns.storable_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.storable_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('storable_id'), 'form-control-success': this.fields.storable_id && this.fields.storable_id.valid}" id="storable_id" name="storable_id" placeholder="{{ trans('admin.item.columns.storable_id') }}">
        <div v-if="errors.has('storable_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('storable_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('storable_type'), 'has-success': this.fields.storable_type && this.fields.storable_type.valid }">
    <label for="storable_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.item.columns.storable_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.storable_type" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('storable_type'), 'form-control-success': this.fields.storable_type && this.fields.storable_type.valid}" id="storable_type" name="storable_type" placeholder="{{ trans('admin.item.columns.storable_type') }}">
        <div v-if="errors.has('storable_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('storable_type') }}</div>
    </div>
</div>


