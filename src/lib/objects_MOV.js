function findKey(obj, path)
{
  return path.split('.').reduce( (value, key) => {
    return value && value[key] !== undefined ? value[key] : undefined;
  }, obj);
}
