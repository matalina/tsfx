@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.door.actions.edit', ['name' => $door->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <door-form
                :action="'{{ $door->resource_url }}'"
                :data="{{ $door->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.door.actions.edit', ['name' => $door->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.door.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </door-form>

        </div>
    
</div>

@endsection