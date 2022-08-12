<?

class UserActivityController {
    public static function getAll() {
        $activities = UserActivity::getAll();

        if ($activities) {
            return $activities;
        }

        return 'Ошибка, виды деятельности не найдены';
    }
}

?>