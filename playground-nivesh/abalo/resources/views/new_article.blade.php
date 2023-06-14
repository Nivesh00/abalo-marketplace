<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta id="csrf_id" name="csrf-token" content="{{ csrf_token() }}" />
    <title>Artikel Hinzufügen</title>
</head>

<body id="myApp">


<table class="article">
    <caption>@{{ msg }}</caption>
    <thead>
    <tr>
        <th></th><th></th><th></th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="row in rows">
        <td><label for="row.name">@{{row.label}}</label></td>
        <td>
            <input v-if="row.boxtype==='input'" :id="row.name" :placeholder="row.placeholder"
                   :required="row.required" :type="row.type" :maxlength="row.maxlength"
                   v-model="row.value" @input="checkChar(row.name, row.value)">

            <textarea v-if="row.boxtype==='textarea'" :id="row.name" :placeholder="row.placeholder"
                      :required="row.required" :maxlength="row.maxlength"
                      v-model="row.value"></textarea>
        </td>
        <td>@{{ row.errorMsg }}</td>
    </tr>
    </tbody>
</table>

<button @click="submit">Artikel erstellen</button>

</body>
@vite('resources/js/app.js')

</html>
