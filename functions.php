<?php
function filtering($value = '', $type = 'output', $valType = 'string', $funcArray = '')
{
    global $abuse_array, $abuse_array_value;

    if ($valType != 'int' && $type == 'output')
    {
        $value = str_ireplace($abuse_array, $abuse_array_value, $value);
    }

    if ($type == 'input' && $valType == 'string')
    {
        $value = str_replace('<', '< ', $value);
    }

    $content = $filterValues = '';
    if ($valType == 'int')
    {
        $filterValues = (isset($value) ? (int)strip_tags(trim($value)) : 0);
    }
    if ($valType == 'float')
    {
        $filterValues = (isset($value) ? (float)strip_tags(trim($value)) : 0);
    }
    else if ($valType == 'string')
    {
        $filterValues = (isset($value) ? (string)strip_tags(trim($value)) : NULL);
    }
    else if ($valType == 'text')
    {
        $filterValues = (isset($value) ? (string)trim($value) : NULL);
    }
    else
    {
        $filterValues = (isset($value) ? trim($value) : NULL);
    }

    if ($type == 'input')
    {
        //$content = mysql_real_escape_string($filterValues);
        //$content = $filterValues;
        //$value = str_replace('<', '< ', $filterValues);
        $content = addslashes($filterValues);
    }
    else if ($type == 'output')
    {
        if ($valType == 'string')
        {
            $filterValues = html_entity_decode($filterValues);
        }
        $value = str_replace(array('\r', '\n', ''), array('', '', ''), $filterValues);
        $content = stripslashes($value);
    }
    else
    {
        $content = $filterValues;
    }

    if ($funcArray != '')
    {
        $funcArray = explode(',', $funcArray);
        foreach ($funcArray as $functions)
        {
            if ($functions != '' && $functions != ' ')
            {
                if (function_exists($functions))
                {
                    $content = $functions($content);
                }
            }
        }
    }

    return $content;
}
?>