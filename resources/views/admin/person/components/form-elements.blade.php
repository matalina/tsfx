<div class="form-group row align-items-center" :class="{'has-danger': errors.has('full_name'), 'has-success': this.fields.full_name && this.fields.full_name.valid }">
    <label for="full_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.person.columns.full_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.full_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('full_name'), 'form-control-success': this.fields.full_name && this.fields.full_name.valid}" id="full_name" name="full_name" placeholder="{{ trans('admin.person.columns.full_name') }}">
        <div v-if="errors.has('full_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('full_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': this.fields.name && this.fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.person.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': this.fields.name && this.fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.person.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': this.fields.description && this.fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.person.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="'required'" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('is_self'), 'has-success': this.fields.is_self && this.fields.is_self.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_self" type="checkbox" v-model="form.is_self" v-validate="''" data-vv-name="is_self"  name="is_self_fake_element">
        <label class="form-check-label" for="is_self">
            {{ trans('admin.person.columns.is_self') }}
        </label>
        <input type="hidden" name="is_self" :value="form.is_self">
        <div v-if="errors.has('is_self')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_self') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('always_on_person'), 'has-success': this.fields.always_on_person && this.fields.always_on_person.valid }">
    <label for="always_on_person" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.person.columns.always_on_person') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.always_on_person" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('always_on_person'), 'form-control-success': this.fields.always_on_person && this.fields.always_on_person.valid}" id="always_on_person" name="always_on_person" placeholder="{{ trans('admin.person.columns.always_on_person') }}">
        <div v-if="errors.has('always_on_person')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('always_on_person') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('location'), 'has-success': this.fields.location && this.fields.location.valid }">
    <label for="location" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.person.columns.location') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.location" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('location'), 'form-control-success': this.fields.location && this.fields.location.valid}" id="location" name="location" placeholder="{{ trans('admin.person.columns.location') }}">
        <div v-if="errors.has('location')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('location') }}</div>
    </div>
</div>


