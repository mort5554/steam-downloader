export const pluralize = (count, one, few, many) => {
  const n = Math.abs(count)

  if (n === 1) return one

  const lastDigit = n % 10
  console.log(lastDigit)
  const lastTwoDigits = n % 100

  if (lastDigit >= 2 && lastDigit <= 4) {
    return few
  }

  return many
}