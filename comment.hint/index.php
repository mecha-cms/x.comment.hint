<?php namespace _\lot\x\comment;

function hint($content) {
    if (false !== ($i = \strpos($content, ' name="comment[content]"'))) {
        $end = '</textarea>';
        if (false !== ($j = \strpos(\substr($content, $i), $end))) {
            $i += $j + \strlen($end);
            $hint = \State::get("x.comment\\.hint.hint");
            $hint = $hint ? '<small style="display: block; margin-top: .5rem;">' . $hint . '</small>' : "";
            return \substr($content, 0, $i) . $hint . \substr($content, $i);
        }
    }
    return $content;
}

\Hook::set('content', __NAMESPACE__ . "\\hint", 10);
