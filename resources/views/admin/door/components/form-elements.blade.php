<div class="form-group row align-items-center" :class="{'has-danger': errors.has('direction'), 'has-success': this.fields.direction && this.fields.direction.valid }">
    <label for="direction" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.door.columns.direction') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.direction" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('direction'), 'form-control-success': this.fields.direction && this.fields.direction.valid}" id="direction" name="direction" placeholder="{{ trans('admin.door.columns.direction') }}">
        <div v-if="errors.has('direction')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('direction') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('is_locked'), 'has-success': this.fields.is_locked && this.fields.is_locked.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_locked" type="checkbox" v-model="form.is_locked" v-validate="''" data-vv-name="is_locked"  name="is_locked_fake_element">
        <label class="form-check-label" for="is_locked">
            {{ trans('admin.door.columns.is_locked') }}
        </label>
        <input type="hidden" name="is_locked" :value="form.is_locked">
        <div v-if="errors.has('is_locked')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_locked') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('key'), 'has-success': this.fields.key && this.fields.key.valid }">
    <label for="key" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.door.columns.key') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.key" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('key'), 'form-control-success': this.fields.key && this.fields.key.valid}" id="key" name="key" placeholder="{{ trans('admin.door.columns.key') }}">
        <div v-if="errors.has('key')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('key') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('password'), 'has-success': this.fields.password && this.fields.password.valid }">
    <label for="password" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.door.columns.password') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="password" v-model="form.password" v-validate="'min:7'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('password'), 'form-control-success': this.fields.password && this.fields.password.valid}" id="password" name="password" placeholder="{{ trans('admin.door.columns.password') }}" ref="password">
        <div v-if="errors.has('password')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('password') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('password_confirmation'), 'has-success': this.fields.password_confirmation && this.fields.password_confirmation.valid }">
    <label for="password_confirmation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.door.columns.password_repeat') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="password" v-model="form.password_confirmation" v-validate="'confirmed:password|min:7'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('password_confirmation'), 'form-control-success': this.fields.password_confirmation && this.fields.password_confirmation.valid}" id="password_confirmation" name="password_confirmation" placeholder="{{ trans('admin.door.columns.password') }}" data-vv-as="password">
        <div v-if="errors.has('password_confirmation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('password_confirmation') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('room_a'), 'has-success': this.fields.room_a && this.fields.room_a.valid }">
    <label for="room_a" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.door.columns.room_a') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.room_a" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('room_a'), 'form-control-success': this.fields.room_a && this.fields.room_a.valid}" id="room_a" name="room_a" placeholder="{{ trans('admin.door.columns.room_a') }}">
        <div v-if="errors.has('room_a')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('room_a') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('room_b'), 'has-success': this.fields.room_b && this.fields.room_b.valid }">
    <label for="room_b" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.door.columns.room_b') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.room_b" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('room_b'), 'form-control-success': this.fields.room_b && this.fields.room_b.valid}" id="room_b" name="room_b" placeholder="{{ trans('admin.door.columns.room_b') }}">
        <div v-if="errors.has('room_b')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('room_b') }}</div>
    </div>
</div>


