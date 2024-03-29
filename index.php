<?php namespace x\comment__hint;

// Disable this extension if `comment` extension is disabled or removed ;)
if (!isset($state->x->comment)) {
    return;
}

function y__form__comment($y) {
    foreach (['author', 'content', 'email', 'link'] as $key) {
        if (isset($y[1][$key]) && \is_array($y[1][$key])) {
            if ($hint = \State::get("x.comment\\.hint." . $key)) {
                $y[1][$key][1][2][1][] = [
                    0 => 'br',
                    1 => false
                ];
                $y[1][$key][1][2][1][] = [
                    0 => 'small',
                    1 => (string) $hint
                ];
            }
        }
    }
    return $y;
}

\Hook::set('y.form.comment', __NAMESPACE__ . "\\y__form__comment", 10);