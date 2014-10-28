<?php

if (!defined('LEGACY2_APP')) {
    die();
}

// output page footer
echo '
</td></tr>
<tr><td class="footer">
    <p style="color: gray;">&copy 2005</p>
</td></tr></table>
</div>
</body>
</html>';

// end output buffering and send contents
ob_end_flush();

?>