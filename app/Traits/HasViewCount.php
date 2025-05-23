<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasViewCount
{
    /**
     * Increment view count for the model, only if the current session hasn't already viewed it.
     *
     * @return int
     */
    
    public function views(): int
    {
        $modelName = Str::singular(Str::of($this->getTable()));
        $sessionKey = "is_{{$modelName}}_{{$this->id}}_viewed";
        if (! session()->get($sessionKey)) {
            self::withoutTimestamps(function () {
                $this->increment('views');
            });
            session()->put($sessionKey, true);
        }
        return $this->views;
    }
}
