<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('msp:clear-pastes')->hourly();
