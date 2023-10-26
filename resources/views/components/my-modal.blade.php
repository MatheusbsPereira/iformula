@props(['name'])
<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <div x-data="{ show: false , name : '{{ $name }}'}" x-show= "show" x-on:open-modal.window=" show = ($event.detail.name === name)"
        x-on:close-modal.window="show = false" x-on:keydown.escape.window="show = false" id="modalId" style="display: none">
        <div class="mymodal">
            {{$slot}}
        </div>
    </div>
</div>
