import { mount } from '@vue/test-utils'
import File from '@/components/svg/File'

describe('File', () => {
  const wrapper = mount(File)

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('renders correctly', () => {
    expect(wrapper.element).toMatchSnapshot()
  })
})
