<template>
    <table>
        <tr>
            <th>{{ __('admin.id') }}</th>
            <th>{{ __('admin.name') }}</th>
            <th>{{ __('admin.post') }}</th>
            <th>{{ __('admin.rank') }}</th>
            <th>{{ __('admin.shift') }}</th>
            <th></th>
        </tr>
        <tr v-for="employee in employees">
            <td>{{ employee.id }}</td>
            <td>{{ employee.lastname }} {{ employee.firstname }}</td>
            <td>{{ employee.post.name }}</td>
            <td>{{ employee.rank.name }}</td>
            <td>{{ employee.shift.shift_number }}</td>
            <td>
                <div class="col-4 flex-row">
                    <a :href="employee.employeeRoute" class="btn btn-sm btn-info">{{ __('admin.edit') }}</a>
                    <form method="post" :action="employee.removeRoute">
                        <input type="hidden" name="_token" :value="token">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger">{{ __('admin.delete') }}</button>
                    </form>
                </div>
            </td>
        </tr>
    </table>
</template>

<script>
    export default {
        name: "AppComponent",
        props: ['employees'],
        data: function () {
            return {
                token: window.laravel_csrf
            }
        }
    }
</script>

<style scoped>

</style>