import { mount } from '@vue/test-utils'
import Category from '@/components/svg/Category'

describe('Category', () => {
  const wrapper = mount(Category)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
