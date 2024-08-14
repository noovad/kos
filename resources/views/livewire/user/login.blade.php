<div>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" wire:model="form.name">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" wire:model="form.password">
        </div>
        <button wire:click="login">Login</button>
</div>
