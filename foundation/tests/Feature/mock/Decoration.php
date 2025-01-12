<?php

enum Decoration: string
{
    case HELP = 'help';
    case REQUIRED = 'required';
    case LABEL = 'label';
    case WIDTH = 'width';
    case WIDTH_MAX = 'widthMax';
    case WIDTH_MIN = 'widthMin';
    case HEIGHT = 'height';
    case HEIGHT_MAX = 'heightMax';
    case HEIGHT_MIN = 'heightMin';
    case RATIO = 'ratio';
    case CROP_AUTOMATICALLY = 'cropAutomatically';
}
