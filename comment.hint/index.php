<?php namespace x;

function comment__hint($content) {
    foreach (['author', 'email', 'link'] as $v) {
        if (false !== ($i = $test = \strpos($content, ' name="comment[' . $v . ']"'))) {
            $end = '>';
            if (false !== ($j = \strpos(\substr($content, $i), $end))) {
                $i += $j + \strlen($end);
                if (false === \strpos(\substr($content, $test, $j), ' type="hidden"')) {
                    $hint = \State::get("x.comment\\.hint." . $v);
                    $hint = $hint ? '<br><small>' . \i($hint) . '</small>' : "";
                    $content = \substr($content, 0, $i) . $hint . \substr($content, $i);
                }
            }
        }
    }
    if (false !== ($i = $test = \strpos($content, ' name="comment[content]"'))) {
        $end = '</textarea>';
        if (false !== ($j = \strpos(\substr($content, $i), $end))) {
            $i += $j + \strlen($end);
            if (false === \strpos(\substr($content, $test, $j), ' type="hidden"')) {
                $hint = \State::get("x.comment\\.hint.content");
                $hint = $hint ? '<br><small>' . \i($hint) . '</small>' : "";
                $content = \substr($content, 0, $i) . $hint . \substr($content, $i);
            }
        }
    }
    return $content;
}

\Hook::set('content', __NAMESPACE__ . "\\comment__hint", 10);