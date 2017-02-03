<?php

class AnimalProps {
    public $getAnimalProps;

    function __construct($getAnimalProps = null){
        $this->getAnimalProps = $getAnimalProps;
    }

    public function initAnimalProps($post_id) {

        $animalProps = '';
        foreach (get_field_objects($post_id) as $field) :

            // Save variables for later
            $name = $field['name'];
            $label = $field['label'];
            $value = $field['value'];
            $type = $field['type'];

            if ($type === 'select' || $type === 'radio' || $type === 'date_picker') :
                if ($this->getAnimalProps === 'tags') :
                   $animalProps .= $this->animalTagsProps($name, $label, $value, $type);
                elseif ($this->getAnimalProps === 'properties') :
                    $animalProps .= $this->animalProps($name, $label, $value, $type);
                endif;
            endif;

        endforeach;
        return $animalProps;
    }

    public function animalProps($name, $label, $value, $type) {

        // Initiate RenderPropsHTML class as $html
        $html = new RenderPropsHTML($name);
        $class = 'animal-property';

        if (is_array($value)) {

            // Render header and store in output
            $output = $html->renderValue('h3', $label);

            // Empty container for li elements
            $list = '';

            foreach ($value as $val) {
                $list .= $html->renderValue('li', $val, $val);
            }

            // Render li elements in ul with no class and store in output
            $output .= $html->renderContainer($list, false, 'ul');

            // Render output in container
            return $html->renderContainer($output, $class);

        } elseif ($type === 'radio') {
            return $html->renderContainer($html->renderValue('h3', $label, $value), $class);
        } else {
            return $html->renderContainer($html->renderValue('h3', $label) . $html->renderValue('p', $value, $value), $class);
        }

    }

    public function animalTagsProps($name, $label, $value, $type) {

        $html = new RenderPropsHTML($name);
        $tag = 'span';

        if (is_array($value)) {
            $output = '';
            foreach ($value as $key => $val) {
                $output .= $html->renderValue($tag, $val, $val); // all or just one?
            }
            return $output;
        } elseif($type === 'select') {
           return $html->renderValue($tag, $value, $value);
        }

        if ($type === 'radio' && $value === 'yes') :
            return $html->renderValue($tag, $label, $value);
        endif;

    }

    public function searchFilterProps($searchFilterGroup) {
        $output = '';

        foreach (acf_get_fields($searchFilterGroup) as $field) :
            $name = $field['name'];
            $label = $field['label'];
            $type = $field['type'];

            // || $type === 'date_picker' for deliveryready and birthdate 
            // 

            if($type === 'select' || $type === 'radio' || $type === 'number') :

                switch ($type) {
                    case 'select':
                        if ($name === 'catbreed' || $name === 'dogbreed')
                            $class = ' breed dropdown';
                        else {
                            $class = ' dropdown';
                        }
                        break;
                    case 'radio':
                        $class = ' toggle';
                        break;
                    case 'date_picker':
                        $class = ' date';
                        break;
                    case 'number':
                        $class = ' range';
                        break;
                    default:
                        $class = '';
                        break;
                }

                $fields_conditional = $field['conditional_logic'];

                if (!is_array($fields_conditional)) :

                    $output .= '<div class="filter'. $class .'" data-field="'.$name.'">';

                elseif (is_array($fields_conditional)) :

                    foreach ($fields_conditional as $field_conditional) :
                        foreach ($field_conditional as $condition) :
                           $field_condition = $condition['value'];
                        endforeach;
                    endforeach;

                    $output .= '<div class="filter'. $class .'" data-field="'.$name.'" data-condition="'.$field_condition.'">';

                endif;

                $html = new RenderPropsHTML($name);

                $output .= $html->renderValue('h3', $label);

                if (isset($field['choices'])) :
                    $output .= '<ul>';
                        foreach ($field['choices'] as $key => $choice) :
                            $filterChoice = ($type !== 'radio') ? $choice : '';
                            if ($key !== 'yes') $output .= '<li class="property" data-field="'.$name.'" data-value="'.$key.'">' . $filterChoice . '</li>';
                        endforeach;
                    $output .= '</ul>';
                endif;



                $output .= '</div>';

            endif;
        endforeach;
        return $output;
    }
}

class RenderPropsHTML {
    public $field_name;

    function __construct($field_name){
        $this->field_name = $field_name;
    }

    function renderValue($tag, $output, $value = false) {
        $value = ($value !== false) ? 'data-value="'.$value.'"' : '';
        return '<'.$tag.' class="property" data-field="'.$this->field_name.'" '.$value.' >' . $output . '</'.$tag.'>';
    }

    function renderContainer($output, $class = false, $tag = 'div', $condition = false) {
        $class = ($class !== false) ? ' class="'.$class.'"' : '';
        $condition = ($condition !== false) ? ' data-condition="'.$condition.'"' : '';
        return '<'.$tag.$class.'>'.$output.'</'.$tag.'>';
    }

}
